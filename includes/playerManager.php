<?php

    class playerManager extends dbConnection{

        private $players;


        public function __construct(){
            $sql="SELECT * FROM `vote_table` ORDER BY `number_of_votes` DESC ";
            $conn=$this->connect();
            if ($conn) {
        
                if ($ex=$conn->query($sql)) {
                    mysqli_close($conn);
                

                
                    while($result=mysqli_fetch_assoc($ex)){
                        $this->players[]=$result;
                   
                    }

                    
              

                

                } 
                else {
                    die('query not executed!!!');
                }
            
            
            
            
            } else {
            die('Connection Failed!!!');
            }
        }


        public function getPlayers(){
            return $this->players;
        }

        public function addPlayer($player,$uni,$sport,$image){
            $sql="INSERT INTO `vote_table`(`player_name`, `university`, `sport`, `image`, `number_of_votes`) VALUES ('".$player."','".$uni."','".$sport."','".$image."','0')";
            $conn=$this->connect();
            $r;
            if ($conn) {
            
                if ($ex=$conn->query($sql)) {
                    $arr = array("player_name"=>"{$player}", "university"=>"{$uni}", "sport"=>"{$sport}", "image"=>"{$image}", "number_of_votes"=>"");
                    $this->players[]=$arr;
                    mysqli_close($conn);
                    $r='0';
                    

                } else {
                    $r="1";
                    //die('query not executed!!!');
                }
                
                
                
                
            } else {
                $r="2";
                //die('Connection Failed!!!');
            }

            return $r;
        }

        public function deletePlayer($id){
            $sql="DELETE FROM `vote_table` WHERE `id`='".$id."'";
            $conn=$this->connect();
            $r;
            if ($conn) {
            
                if ($ex=$conn->query($sql)) {
                 
                    mysqli_close($conn);
                    $r='0';
                    

                } else {
                    $r="1";
                    //die('query not executed!!!');
                }
                
                
                
                
            } else {
                $r="2";
                //die('Connection Failed!!!');
            }

            return $r;
        }

        public function editPlayer($id,$player,$uni,$sport,$image){
            $sql="UPDATE `vote_table` SET `player_name`='".$player."',`university`='".$uni."',`sport`='".$sport."',`image`='".$image."' WHERE `id`='".$id."'";
            $conn=$this->connect();
            $r;
            if ($conn) {
            
                if ($ex=$conn->query($sql)) {
                 
                    mysqli_close($conn);
                    $r='0';
                    

                } else {
                    $r="1";
                    //die('query not executed!!!');
                }
                
                
                
                
            } else {
                $r="2";
                //die('Connection Failed!!!');
            }

            return $r;
        }

        /*public function getSpecificPlayer($id){
            $sql="SELECT `player_name`, `university`, `sport`, `image`, `number_of_votes` FROM `vote_table` WHERE `id`='".$id."' ";
            $conn=$this->connect();
            if ($conn) {
        
                if ($ex=$conn->query($sql)) {
                    mysqli_close($conn);
                    $result=mysqli_fetch_assoc($ex);

                    print_r($this->players);
                } 
                else {
                    die('query not executed!!!');
                }
            
            
            
            
            } else {
            die('Connection Failed!!!');
            }
        }*/

        public function addVote($id){
            $sql="UPDATE `vote_table` SET `number_of_votes`=`number_of_votes`+1 WHERE `id`=$id";
            $conn=$this->connect();
            $r;
            if ($conn) {
            
                if ($ex=$conn->query($sql)) {
                 
                    mysqli_close($conn);
                    $r='0';
                    

                } else {
                    $r="1";
                    //die('query not executed!!!');
                }
                
                
                
                
            } else {
                $r="2";
                //die('Connection Failed!!!');
            }

            return $r;
            
        }






    }







?>