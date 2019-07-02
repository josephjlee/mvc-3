<?php

namespace App\Model;

use Core\Database;

/**
 * Class UsersModel
 * @package App\Model
 */
class UsersModel
{
    /**
     * @var
     */
    private $id;
    /**
     * @var
     */
    private $username;
    /**
     * @var
     */
    private $email;
    /**
     * @var
     */
    private $password;
    /**
     * @var
     */
    private $roleId;
    /**
     * @var
     */
    private $active;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    public function __construct()
    {
        $this->db = new Database();
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getRoleId()
    {
        return $this->roleId;
    }

    /**
     * @param mixed $roleId
     */
    public function setRoleId($roleId)
    {
        $this->roleId = $roleId;
    }

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param mixed $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    public function save($id = null){
        if($id !== null){
            $this->id = $id;
            $this->update();
        }else{
            $this->create();
        }
    }

    public function update(){

        $setContent = "name = '$this->username', email = '$this->email', password = '$this->password', role_id = 1, active = 1";
        $this->db->update('user', $setContent)->where('id',$this->id);
        $this->db->get();
    }

    public function create(){

        $columns = 'name, email, password, role_id, active';
        $values = "'$this->username', '$this->email','$this->password','$this->roleId', 1";
        $this->db->insert('user', $columns, $values);
        $this->db->get();
    }

    public static function verification($email, $password){
        $db = new Database();
        $db->select()->from('user')->where('email',$email)->andWhere('password', md5($password));
        return $db->get();
    }
}
