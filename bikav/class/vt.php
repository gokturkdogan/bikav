<?php

class VT
{
    var $server = "localhost";
    var $user = "root";
    var $password = "";
    var $dbname = "bikavpanel";

    var $connection;

    function __construct()
    {

        try {
            $this->connection = new PDO("mysql:host=" . $this->server . ";dbname=" . $this->dbname . ";charset=utf8", $this->user, $this->password);
        }
        catch (PDOException $error) {
            echo $error->getMessage();
            exit();

        }

    }


    public function getdata($tablo,$wherealanlar="",$wherearraydeger="",$ordeby="ORDER BY ID ASC",$limit=""){
        $this->connection->query("SET CHARACTER SET utf8");
        $sql="SELECT * FROM ".$tablo;
        if(!empty($wherealanlar) && !empty($wherearraydeger)){

            $sql.=" ".$wherealanlar;
            if(!empty($ordeby)){$sql.=" ".$ordeby;}
            if(!empty($limit)){$sql.=" LIMIT ".$limit;}
            $run=$this->connection->prepare($sql);
            $result=$run->execute($wherearraydeger);
            $data=$run->fetchAll(PDO::FETCH_ASSOC);
        }

        else{
            if(!empty($ordeby)){$sql.=" ".$ordeby;}
            if(!empty($limit)){$sql.=" LIMIT ".$limit;}
            $data=$this->connection->query($sql,PDO::FETCH_ASSOC);

        }
        if($data!=false && !empty($data)){
            $datas=array();
            foreach($data as $information){
                $datas[]=$information;
            }
            return $datas;


        }
        else{
            return false;
        }

    }



    public function SorguCalistir ($tablo,$alanlar="",$degerlerarray="",$limit=""){
        $this->connection->query("SET CHARACTER SET utf8");
        if(!empty($alanlar) && !empty($degerlerarray)){
        $sql=$tablo." ".$alanlar;
        if(!empty($limit)){$sql.=" LIMIT ".$limit;}
        $run=$this->connection->prepare($sql);
        $result=$run->execute($degerlerarray);}
        else{
            $sql=$tablo;
            if(!empty($limit)){$sql.=" LIMIT ".$limit;}
            $result=$this->connection->exec($sql);
        }

        if($result!=false){
            return true;
        }
        else{
            return false;
        }


    }

    public function selflink($val){
        $find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#','?','*','!','.','(',')');
		$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp','','','','','','');
		$string = strtolower(str_replace($find, $replace, $val));
		$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
		$string = trim(preg_replace('/\s+/', ' ', $string));
		$string = str_replace(' ', '-', $string);
		return $string;

    }

    public function ModulEkle(){
        if(!empty ($_POST["baslik"])){
            $baslik=$_POST["baslik"];
            if(!empty($_POST["durum"])){$durum=1;}else{$durum=2;}
            $tablo=str_replace("-","",$this->selflink($baslik));
            $kontrol=$this->getdata("moduller","WHERE tablo=?",array($tablo),"ORDER BY ID ASC",1);
            if($kontrol!=false){
return false;
            }
            else{
                $tabloOlustur=$this->SorguCalistir('CREATE TABLE IF NOT EXISTS `'.$tablo.'`(
                    `ID` int(11) NOT NULL AUTO_INCREMENT,
                    `baslik` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
                    `selflink` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
                    `kategori` int(11) DEFAULT NULL,
                    `metin` text COLLATE utf8_turkish_ci,
                    `resim` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
                    `anahtar` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
                    `aciklama` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
                    `durum` int(5) DEFAULT NULL,
                    `sirano` int(11) DEFAULT NULL,
                    `tarih` date DEFAULT NULL,
                    PRIMARY KEY (`ID`)
                )ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=1;');
                $modulekle=$this->SorguCalistir("INSERT INTO moduller","SET baslik=?, tablo=?, durum=?, tarih=?",array($baslik,$tablo,$durum,date("Y-m-d")));
                $kategoriekle=$this->SorguCalistir("INSERT INTO kategoriler","SET baslik=?, selflink=?, tablo=?, durum=?, tarih=?",array($baslik,$tablo,'modul',1,date("Y-m-d")));
            if($modulekle!=false){
return true;
            }
            else{
return false;
            }
            }


        }
        else{
            return false;
        }
    }

    public function filter($val,$tf=false){
        if($tf==false){
            $val=strip_tags($val);
        }
        $val=addslashes(trim($val));
        return $val;

    }

	public function uzanti($dosyaadi){
		$parca=explode(".",$dosyaadi);
		$uzanti=end($parca);
		$donustur=strtolower($uzanti);
		return $donustur;

	}


    public function upload($nesnename,$yuklenecekyer='images/',$tur='img',$w='',$h='',$resimyazisi='')
	{
		if($tur=="img")
		{
			if(!empty($_FILES[$nesnename]["name"]))
			{
				$dosyanizinadi=$_FILES[$nesnename]["name"];
				$tmp_name=$_FILES[$nesnename]["tmp_name"];
				$uzanti=$this->uzanti($dosyanizinadi);
				if($uzanti=="png" || $uzanti=="jpg" || $uzanti=="jpeg" || $uzanti=="gif")
				{
					$classIMG=new upload($_FILES[$nesnename]);
					if($classIMG->uploaded)
					{
						if(!empty($w))
						{
							if(!empty($h))
							{
								$classIMG->image_resize=true;
								$classIMG->image_x=$w;
								$classIMG->image_y=$h;
							}
							else
							{
								if($classIMG->image_src_x>$w)
								{
									$classIMG->image_resize=true;
									$classIMG->image_ratio_y=true;
									$classIMG->image_x=$w;
								}
							}
						}
						else if(!empty($h))
						{
								if($classIMG->image_src_h>$h)
								{
									$classIMG->image_resize=true;
									$classIMG->image_ratio_x=true;
									$classIMG->image_y=$h;
								}
						}
						
						if(!empty($resimyazisi))
						{
							$classIMG->image_text = $resimyazisi;

						$classIMG->image_text_direction = 'v';
						
						$classIMG->image_text_color = '#FFFFFF';
						
						$classIMG->image_text_position = 'BL';
						}
						$rand=uniqid(true);
						$classIMG->file_new_name_body=$rand;
						$classIMG->Process($yuklenecekyer);
						if($classIMG->processed)
						{
							$resimadi=$rand.".".$classIMG->image_src_type;
							return $resimadi;
						}
						else
						{
							return false;
						}
					}
					else
					{
						return false;
					}
				}
				else
				{
					return false;
				}
			}
			else
			{
				return false;
			}
		}
		else if($tur=="ds")
		{
			
			if(!empty($_FILES[$nesnename]["name"]))
			{
				
				$dosyanizinadi=$_FILES[$nesnename]["name"];
				$tmp_name=$_FILES[$nesnename]["tmp_name"];
				$uzanti=$this->uzanti($dosyanizinadi);
				if($uzanti=="doc" || $uzanti=="docx" || $uzanti=="pdf" || $uzanti=="xlsx" || $uzanti=="xls" || $uzanti=="ppt" || $uzanti=="xml" || $uzanti=="mp4" || $uzanti=="avi" || $uzanti=="mov")
				{
					
					$classIMG=new upload($_FILES[$nesnename]);
					if($classIMG->uploaded)
					{
						$rand=uniqid(true);
						$classIMG->file_new_name_body=$rand;
						$classIMG->Process($yuklenecekyer);
						if($classIMG->processed)
						{
							$dokuman=$rand.".".$uzanti;
							return $dokuman;
						}
						else
						{
							return false;
						}
					}
				}
			}
		}
		else
		{
			return false;
		}
	}

	public function kategorigetir($tablo,$secID="",$uz=-1){

		$uz++;
		$kategori=$this->getdata("kategoriler","WHERE tablo=?",array($tablo),"ORDER BY ID ASC");
		if($kategori!=false){
			for($q=0;$q<count($kategori);$q++){
				$kategoriselflink=$kategori[$q]["selflink"];
				$kategoriID=$kategori[$q]["ID"];
				if($secID==$kategoriID){
					echo '<option value="'.$kategoriID.'"selected="selected">'.str_repeat("&nbsp;&nbsp;&nbsp",$uz).stripslashes($kategori[$q]["baslik"]).'</option>';
				}
				else{
					echo '<option value="'.$kategoriID.'">'.str_repeat("&nbsp;&nbsp;&nbsp",$uz).stripslashes($kategori[$q]["baslik"]).'</option>';
				}

				if($kategoriselflink==$tablo){break;}
				$this->kategorigetir($kategoriselflink,$secID,$uz);

			}
		}

		else{
			return false;
		}

	}
	public function tekKategori($tablo,$secID="",$uz=-1){

		$uz++;
		$kategori=$this->getdata("kategoriler","WHERE selflink=? AND tablo=?",array($tablo,"modul"),"ORDER BY ID ASC");
		if($kategori!=false){
			for($q=0;$q<count($kategori);$q++){
				$kategoriselflink=$kategori[$q]["selflink"];
				$kategoriID=$kategori[$q]["ID"];
				if($secID==$kategoriID){
					echo '<option value="'.$kategoriID.'"selected="selected">'.str_repeat("&nbsp;&nbsp;&nbsp",$uz).stripslashes($kategori[$q]["baslik"]).'</option>';
				}
				else{
					echo '<option value="'.$kategoriID.'">'.str_repeat("&nbsp;&nbsp;&nbsp",$uz).stripslashes($kategori[$q]["baslik"]).'</option>';
				}


			}
		}

		else{
			return false;
		}

	}

}



?>
