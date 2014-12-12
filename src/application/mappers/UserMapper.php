<?php
require_once '../application/models/User.php';
class UserMapper
{

    /**
     *
     * @var PDO
     */
    private $dbAdapter;

    /**
     *
     * @param PDO $db            
     */
    public function __construct($db)
    {
        $this->dbAdapter = $db->getConnexion();
    }

    /**
     *
     * @param int $id            
     * @return boolean|User
     */
    public function findById($id)
    {
        $this->dbAdapter->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $sql = "SELECT * FROM users WHERE id = :id";
        $stm = $this->dbAdapter->prepare($sql);
        $stm->bindParam(':id', $id);
        $req = $stm->execute();
        $row = $stm->fetch();
        
        if (! $row)
            return false;
        
        return $this->rowToObject($row);
    }

    /**
     *
     * @return multitype:User
     */
    public function fetchAll()
    {
        $this->dbAdapter->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $sql = "SELECT * FROM users WHERE 1";
        $stm = $this->dbAdapter->query($sql);
        $rowSet = $stm->fetchAll();
        
        $users = array();
        foreach ($rowSet as $row) {
            $users[] = $this->rowToObject($row);
        }
        
        return $users;
    }

    /**
     * 
     * @param User $user
     * @return boolean
     */
    public function save(User $user)
    {
        // soit null, zero, vide
        // Nouvelle enregistrement ?
        if (0 === (int) $user->getId()) {
            $sql = "INSERT INTO users
               (id,first_name, last_name, email, password,role,cell_phone_number,phone_number,code)
               VALUES (:id, :first_name, :last_name, :email, :password, :role, :cell_phone_number, :phone_number, :code)";
            // ou enregistrement exsitant
        } else {
            $sql = "UPDATE users
                    SET
                       first_name = :first_name,
                       last_name = :last_name,
                       email = :email,
                       password = :password,
                       role = :role, 
                       cell_phone_number = : cell_phone_number,
                       phone_number = :phone_number,
                       code = :code
                   WHERE
                        id = :id";
        }
        $stm = $this->dbAdapter->prepare($sql);
        $row = $this->objectToRow($user);
        return (bool) $stm->execute($row);
    }

    /**
     * 
     * @param int $id
     * @return boolean
     */
    public function delete($id)
    {
        $sql = "DELETE FROM users WHERE id = ?";
        $stm = $this->dbAdapter->prepare($sql);
        return $stm->execute(array($id));
    }

    /**
     *
     * @param string $email            
     * @param string $password            
     * @param int $code            
     * @return multitype:
     */
    public function login($email = NULL, $password = NULL, $code = NULL)
    {
       
        if (0 === (int)$code) {           
            $sql = "SELECT * FROM users WHERE `users`.`email` = :email AND `users`.`password`= :password;";
            $data = array(
                'email' => $email,
                'password' => $password
            );
        } else {
            $sql = "SELECT * FROM users WHERE `users`.`code` = :code ;";
            $data = array(
                'code' => $code
            );
        }
        $sth = $this->dbAdapter->prepare($sql);
        $sth->execute($data);
        if ($sth->rowCount() > 1) {
            // ERREUR FATALE
        }
        $user = $sth->fetchAll(PDO::FETCH_ASSOC); // Retrieves a string array
        return $user;
    }

    /**
     *
     * @param array $row            
     * @return User
     */
    public function rowToObject($row)
    {
        $user = new User();
        $user->setId($row['id']);
        $user->setFirst_name($row['first_name']);
        $user->setLast_name($row['last_name']);
        $user->setEmail($row['email']);
        $user->setPassword($row['password']);
        $user->setRole($row['role']);
        $user->setCell_phone_number($row['cell_phone_number']);
        $user->setPhone_number($row['phone_number']);
        $user->setCode($row['code']);
        return $user;
    }

    /**
     *
     * @param User $user            
     * @return multitype:Ambigous <the, number> Ambigous <the, string>
     */
    public function objectToRow(User $user)
    {
        $row = array();
        $row['id'] = $user->getId();
        $row['first_name'] = $user->getFirst_name();
        $row['last_name'] = $user->getLast_name();
        $row['email'] = $user->getEmail();
        $row['password'] = $user->getPassword();
        $row['role'] = $user->getRole();
        $row['cell_phone_number'] = $user->getCell_phone_number();
        $row['phone_number'] = $user->getPhone_number();
        $row['code'] = $user->getCode();
        
        return $row;
    }
}