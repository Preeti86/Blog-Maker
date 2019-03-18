<?php
class UserModel extends Model{
    public function register(){
        // Sanitize POST
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $password = md5($post['password']);

        if($post['submit']){

            if($post['name'] == '' || $post['email'] == '' || $post['password']){
                Messages::setMsg('Please Fill In All Fields', 'error');
                return;
            }

            // Insert into MySQL
            $this->query('INSERT INTO users (name , email, password) VALUES(:name , :email, :password)');
            $this->bind(':name', $post['name']);
            $this->bind(':email', $post['email']);
            $this->bind(':password', $password);
            $this->execute();
            // Verify
            if($this->lastInsertId()){
                // Redirect
                header('Location: '.ROOT_URL.'users/login');
            }
        }
        return;
    }
    public function login(){
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $password = md5($post['password']);

        if($post['submit']){

            // Insert into MySQL
            $this->query('SELECT * FROM users WHERE email = :email AND password = :password');

            $this->bind(':email', $post['email']);
            $this->bind(':password', $password);

            $row = $this->single();

            if($row){
                $_SESSION['is_logged_in'] = true;
                $_SESSION['user_data'] = array(
                    "id"        => $row['id'],
                    "name"      => $row['name'],
                    "email"     => $row['email'],

                );
                header('Location:'.ROOT_URL.'shares');

            } else {
                Messages::setMsg('Incorrect login', 'error');
            }
        }
        return;
    }
    public function profile(){
        $this->query('SELECT * FROM contact');
        $rows = $this->resultSet();
        return $rows;
    }

    public function addContact(){
        // Sanitize POST
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if($post['submit']){
            if($post['name'] == '' || $post['email'] == '' || $post['street'] == '' || $post['city'] == '' || $post['zipcode'] == ''){
                Messages::setMsg('Please Fill In All Fields', 'error');
                return;
            }
            // Insert into MySQL
            $this->query('INSERT INTO contact (name, email, street, city, zipecode, user_id) VALUES(:name, :email, :street, :city, :zipecode, :user_id)');
            $this->bind(':name', $post['name']);
            $this->bind(':email', $post['email']);
            $this->bind(':street', $post['street']);
            $this->bind(':city', $post['city']);
            $this->bind(':zipecode', $post['zipcode']);
            $this->bind(':user_id', 1);
            $this->execute();
            // Verify
            if($this->lastInsertId()){
                // Redirect
                header('Location: '.ROOT_URL.'profile');
            } else {
            Messages::setMsg('Incorrect format', 'error');
        }

        }
        return;
    }

}