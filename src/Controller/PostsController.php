<?php

namespace App\Controller;

use App\Model\Entity\Post;
use Cake\Datasource\ConnectionManager;
use Cake\Event\Event;

date_default_timezone_set('Asia/Tokyo');

class PostsController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['index']);
    }

    public function index()
    {
        
    }

    public function poststable()
    {
        if ($this->request->getQuery())
        {
            $date = $this->request->query['date'];
        }
        else 
        {
            $date = time();
        }
        
        $sql = 'SELECT * FROM posts WHERE DATE_FORMAT(date_time, "%Y%m") = '.date('Ym', $date).' AND user_id = '.$this->Auth->user('id');
        $connection = ConnectionManager::get('default');
        $posts = $connection->execute($sql)->fetchAll('assoc');
        $this->set(compact('posts'));

        $month = date('m', $date);
        $year = date('Y', $date);

        $lastDay = date('j', mktime(0, 0, 0, $month + 1, 0, $year));

        $calendar = array();
        $j = 0;

        for ($i = 1; $i < $lastDay + 1; $i++) {
            $week = date('w', mktime(0, 0, 0, $month, $i, $year));

            if ($i === 1){
                for ($k = 1; $k <= $week; $k++) {
                    $calendar[$j]['day'] = '';
                    $j++;
                }
            }

            $calendar[$j]['day'] = $i;
            $j++;

            if ($i === $lastDay) {
                for ($l = 1; $l <= 6 - $week; $l++) {
                    $calendar[$j]['day'] = '';
                    $j++;
                }
            }
        }

        $newPost = $this->Posts->newEntity([
            'user_id' => $this->Auth->user('id')
        ]);

        $this->set(compact('calendar'));
        $this->set(compact('newPost'));
        $this->set(compact('date'));
        
    }

    public function add()
    {
        $newPost = $this->Posts->newEntity([
            'user_id' => $this->Auth->user('id')
        ]);
        if ($this->request->is('post')) 
        {
            $newPost = $this->Posts->patchEntity($newPost, $this->request->data);
            if ($this->Posts->save($newPost)) {
                $this->Flash->success('投稿しました');
                return $this->redirect(['action'=>'poststable']);
            } else {
                $this->Flash->error('投稿に失敗しました');
            }
        } 

        $this->set(compact('newPost'));
    }

    public function edit($id = null) 
    {   
        if ($id === null) {
            return $this->redirect(['action'=>'poststable']);
        }
        $post = $this->Posts->get($id);
        if ($this->request->is('put')) {
            $post = $this->Posts->patchEntity($post, $this->request->data);
            if ($this->Posts->save($post)) {
                $this->Flash->success('編集しました');
                return $this->redirect(['action'=>'poststable']);
            } else {
                // error
                $this->Flash->error('編集に失敗しました');
            }
        }
        $this->set(compact('post'));
    }

    public function view($id = null) 
    {
        $post = $this->Posts->get($id);

        if ($post->user_id === $this->Auth->user('id')) {
            $this->set(compact('post'));
        } else {
            return $this->redirect(['action'=>'poststable']);
        }
    }

    public function delete($id = null)
    {
        if ($this->request->is(['post', 'delete'])) {
            $post = $this->Posts->get($id);
            if ($this->Posts->delete($post)) {
                $this->Flash->success('投稿を削除しました');
                return $this->redirect(['action'=>'poststable']);
            } else {
                $this->Flash->error('投稿の削除に失敗しました');
            }
        } else {
            return $this->redirect(['action'=>'poststable']);
        }
    }
}