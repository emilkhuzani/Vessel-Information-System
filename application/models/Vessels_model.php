<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vessels_model extends CI_Model {
    
    public function get_vessel($gps_system,$id_pelanggan){
      if($id_pelanggan=='3' || $id_pelanggan=='4'){
        if($gps_system=='idirect'){
          return $this->db->query("SELECT a.id_node, a.nama_node, a.did, b.latitude_realtime, b.longitude_realtime FROM tabel_node a INNER JOIN tabel_realtime_location b ON a.id_node=b.id_node WHERE a.status='enable'");
        }elseif($gps_system=='idp'){
          $db2 = $this->load->database('db_idp', TRUE);
          return $db2->query("SELECT a.id_kapal, a.nama_kapal, b.latitude, b.longitude, b.heading, b.speed, b.status_gps, b.waktu_lokal FROM tabel_kapal a INNER JOIN tabel_realtime b ON a.id_kapal=b.id_kapal WHERE a.jenis_gps='IDP' ORDER BY b.status_gps DESC");
        }else{
          $db2 = $this->load->database('db_idp', TRUE);
          return $db2->query("SELECT a.id_kapal, a.nama_kapal, b.latitude, b.longitude, b.heading, b.speed, b.status_gps, b.waktu_lokal FROM tabel_kapal a INNER JOIN tabel_realtime b ON a.id_kapal=b.id_kapal WHERE a.jenis_gps='ESI' ORDER BY b.status_gps DESC");
        }
      }else{
        if($gps_system=='idirect'){
          return $this->db->query("SELECT a.id_node, a.nama_node, a.did , b.latitude_realtime, b.longitude_realtime FROM tabel_node a INNER JOIN tabel_realtime_location b ON a.id_node=b.id_node WHERE a.status='enable' AND a.id_pelanggan='$id_pelanggan'");
        }elseif($gps_system=='idp'){
          $db2 = $this->load->database('db_idp', TRUE);
          return $db2->query("SELECT a.id_kapal, a.nama_kapal, b.latitude, b.longitude, b.heading, b.speed, b.status_gps, b.waktu_lokal FROM tabel_kapal a INNER JOIN tabel_realtime b ON a.id_kapal=b.id_kapal WHERE a.jenis_gps='IDP' AND a.id_pelanggan='$id_pelanggan' ORDER BY b.status_gps DESC");
        }else{
          $db2 = $this->load->database('db_idp', TRUE);
          return $db2->query("SELECT a.id_kapal, a.nama_kapal, b.latitude, b.longitude, b.heading, b.speed, b.status_gps, b.waktu_lokal FROM tabel_kapal a INNER JOIN tabel_realtime b ON a.id_kapal=b.id_kapal WHERE a.jenis_gps='ESI' AND a.id_pelanggan='$id_pelanggan' ORDER BY b.status_gps DESC");
        }
      }
    }

}