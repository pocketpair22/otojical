<?php

namespace App\Controller;

use App\Model\Entity\User;
use Cake\Event\Event;

class UsersController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['add', 'logout']);
    }

    public function add()
    {
        $user = new User;
        if ($this->request->is(['post'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Auth->setUser($user);
                $this->Flash->success('ユーザー登録に成功しました');
                return $this->redirect($this->Auth->redirectUrl());                
            } else {
                // error
                $this->Flash->error('ユーザー登録に失敗しました');
            }
        }
        $this->set(compact('user'));
    }

    public function login()
    {
        if ($this->request->is(['post'])) 
        {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                $this->Flash->success('ログインしました');
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('ユーザ名かパスワードが違います'));
        }
    }

    public function logout()
    {
        $this->Flash->success('ログアウトしました');
        return $this->redirect($this->Auth->logout());
    }

    public function view()
    {
 
    }

    public function delete($id = null)
    {
        if ($this->request->is(['delete'])) 
        {
            $id = $this->Auth->user('id');
            $user = $this->Users->get($id);
            if ($this->Users->delete($user)) 
            {
                $this->Flash->success('退会しました');
                return $this->redirect($this->Auth->logout());
            } else {
                $this->Flash->error('退会に失敗しました');
            }
        }
    }
}