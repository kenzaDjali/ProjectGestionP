<?php


class UserService
{

 /**
     *
     * @var userMapper
     */
    private $userMapper;

    /**
     *
     * @param UserMapper $userMapper            
     */
    public function __construct(UserMapper $userMapper)
    {
        $this->userMapper = $userMapper;
    }
    

    public function readAll()
    {
        $users = $this->userMapper->fetchAll();
        return $users;
    }

    public function findById($id)
    {
        $user = $this->userMapper->findById($id);
        return $user;
    }

    public function save(User $user)
    {
        return $this->userMapper->save($user);
    }

    public function delete($id)
    {
        return $this->userMapper->delete($id);
    }
    public function login($email= NULL, $password = NULL, $code=NULL)
    {
        // TODO: test qu'ils sont pas vide tous les 3 
        return $this->userMapper->login($email, $password, $code);
    }
}