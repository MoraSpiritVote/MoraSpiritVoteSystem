<?php

class frontPage extends dbConnection{
    
    private $year;
    private $slideImage1;
    private $slideImage2;
    private $mainQuoteInImage1;
    private $mainQuoteInImage2;
    private $smallQuoteInImage1;
    private $smallQuoteInImage2;
    private $parellexImage;
    private $nominatePlayers;


    public function __construct(){
        $sql = "SELECT * FROM `frontend_elements`";
        $conn=$this->connect();
        if ($conn) {
        
            if ($ex=$conn->query($sql)) {
                mysqli_close($conn);
                

                $a = array();
                while($result=mysqli_fetch_assoc($ex)){
                    $a[]=$result;
                   
                }
              

                for ($i=0; $i <count($a) ; $i++) { 
                    $el_name='';
                    foreach ($a[$i] as $x => $x_value) {
                        if($x=='element_name'){
                            $el_name=$x_value;
                        }elseif ($x=='element') {
                            $this->$el_name=$x_value;
                        }
                    }
                }

                $r=$this->smallQuoteInImage1;
        



                
                
    
               
                
                
            } else {
                die('query not executed!!!');
            }
            
            
            
            
        } else {
            die('Connection Failed!!!');
        }

    }


    public function setYear($year){
        $sql="UPDATE `frontend_elements` SET `element`='".$year."' WHERE `element_name`='year'";
        $conn=$this->connect();
        $r;
        if ($conn) {
        
            if ($ex=$conn->query($sql)) {
                $this->year=$year;
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

    public function getYear(){
        return $this->$year;

    }

    public function setSlideImage1($image){
        $sql="UPDATE `frontend_elements` SET `element`='".$image."' WHERE `element_name`='slideImage1'";
        $conn=$this->connect();
        $r;
        if ($conn) {
        
            if ($ex=$conn->query($sql)) {
                $this->slideImage1=$image;
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

    public function getSlideImage1(){
        return $this->slideImage1;

    }
    public function setSlideImage2($image){
        $sql="UPDATE `frontend_elements` SET `element`='".$image."' WHERE `element_name`='slideImage2'";
        $conn=$this->connect();
        $r;
        if ($conn) {
        
            if ($ex=$conn->query($sql)) {
                $this->slideImage1=$image;
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
    public function getSlideImage2(){
        return $this->slideImage2;

    }
    public function setmainQuoteInImage1($str){
        $sql="UPDATE `frontend_elements` SET `element`='".$str."' WHERE `element_name`='mainQuoteInImage1'";
        $conn=$this->connect();
        $r;
        if ($conn) {
        
            if ($ex=$conn->query($sql)) {
                $this->mainQuoteInImage1=$str;
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
    public function getmainQuoteInImage1(){
        return $this->mainQuoteInImage1;

    }
    public function setmainQuoteInImage2($str){
        $sql="UPDATE `frontend_elements` SET `element`='".$str."' WHERE `element_name`='mainQuoteInImage2'";
        $conn=$this->connect();
        $r;
        if ($conn) {
        
            if ($ex=$conn->query($sql)) {
                $this->mainQuoteInImage2=$str;
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
    public function getmainQuoteInImage2(){
        return $this->mainQuoteInImage2;

    }
    public function setsmallQuoteInImage1($str){
        $sql="UPDATE `frontend_elements` SET `element`='".$str."' WHERE `element_name`='smallQuoteInImage1'";
        $conn=$this->connect();
        $r;
        if ($conn) {
        
            if ($ex=$conn->query($sql)) {
                $this->smallQuoteInImage1=$str;
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
    public function getsmallQuoteInImage1(){
        //print($this->smallQuoteInImage1);
        return $this->smallQuoteInImage1;

    }
    public  function setsmallQuoteInImage2($str){

        $sql="UPDATE `frontend_elements` SET `element`='".$str."' WHERE `element_name`='smallQuoteInImage2'";
        $conn=$this->connect();
        $r;
        if ($conn) {
        
            if ($ex=$conn->query($sql)) {
                $this->smallQuoteInImage2=$str;
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
    public function getsmallQuoteInImage2(){
        return $this->smallQuoteInImage2;

    }
    public function setparellexImage($image){

    }
    
    







} 







?>