<?php

function backup_tables($host,$user,$pass,$name,$tables = '*')
{
   $return='';
   $link = new mysqli($host,$user,$pass,$name);
   
   //Obtener las tablas
      $tables = array();
      $result = $link->query('SHOW TABLES');
      while($row = mysqli_fetch_row($result))
      {
         $tables[] = $row[0];
      }

   //Configuraciones
   $return.=
   "/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
   /*!40101 SET NAMES utf8 */;
   /*!50503 SET NAMES utf8mb4 */;
   /*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
   /*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;\n\n";

   //Eliminar base de datos y volver a crear
   $return.= 'DROP DATABASE IF EXISTS `'.$name."`;\n";
   $return.= 'CREATE DATABASE IF NOT EXISTS `'.$name."`;\n";
   $return.= 'USE `'.$name."`;\n";
   
   //cycle through
   foreach($tables as $table)
   {
      $result = $link->query('SELECT * FROM '.$table);
      $num_fields = mysqli_num_fields($result);

      $row2 = mysqli_fetch_row($link->query('SHOW CREATE TABLE '.$table));
      $return.= "\n\n".$row2[1].";\n\n";
      
    for ($i = 0; $i < $num_fields; $i++)
      {
         while($row = mysqli_fetch_row($result))
         {
            $return.= 'INSERT INTO '.$table.' VALUES(';
            for($j=0; $j<$num_fields; $j++) 
            {
               $row[$j] = addslashes($row[$j]);
               $row[$j] = preg_replace("/\n/","\\n",$row[$j]);
               if (isset($row[$j]) and ($row[$j] != ''))
               {
                  $return.= '"'.$row[$j].'"' ;
               }
               else
               {
                  $return.="NULL";
               }

               if ($j<($num_fields-1)) { $return.= ','; }
            }
            $return.= ");\n";
         }
      }
      $return.="\n\n\n";
   }
   $fecha=date("Y-m-d");
   //save file
   $handle = fopen('backups/db-backup-'.$fecha.'.sql','w+');
    fwrite($handle,$return);
    fclose($handle);
}

?>

