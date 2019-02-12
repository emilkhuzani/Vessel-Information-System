<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitor_model extends CI_Model {
    
    public function get_vessel($id_pelanggan){
      if($id_pelanggan=='3' || $id_pelanggan=='4'){
        return $this->db->query("SELECT a.id_node, a.nama_node, b.latitude_realtime, a.foto, b.longitude_realtime, c.latitude as ref_latitude, c.longitude as ref_longitude FROM tabel_node a INNER JOIN tabel_realtime_location b ON a.id_node=b.id_node INNER JOIN tabel_referensi_heading c ON a.id_node=c.id_node WHERE a.status='enable'");
      }else{
        return $this->db->query("SELECT a.id_node, a.nama_node, b.latitude_realtime, a.foto, b.longitude_realtime, c.latitude as ref_latitude, c.longitude as ref_longitude FROM tabel_node a INNER JOIN tabel_realtime_location b ON a.id_node=b.id_node INNER JOIN tabel_referensi_heading c ON a.id_node=c.id_node WHERE a.status='enable' AND a.id_pelanggan='$id_pelanggan'");
      }
      
    }

    public function get_vessel_idp($id_pelanggan){
    	$db2 = $this->load->database('db_idp', TRUE);
        if($id_pelanggan=='3' || $id_pelanggan=='4'){
          return $db2->query("SELECT id_kapal, nama_kapal FROM tabel_kapal");
        }else{
            return $db2->query("SELECT id_kapal, nama_kapal FROM tabel_kapal WHERE id_pelanggan='$pelanggan'");
        }
    	
    }

    public function get_tracking_idp($id_kapal){
    	$db2 = $this->load->database('db_idp', TRUE);
    	return $db2->query("SELECT latitude, longitude, heading, status_gps, speed, waktu_lokal FROM tabel_realtime WHERE id_kapal='$id_kapal' ORDER BY tanggal DESC, jam DESC LIMIT 1");
    }

    public function ajax_idp($id_pelanggan){
        $db2 = $this->load->database('db_idp', TRUE);
        if($id_pelanggan=='3' || $id_pelanggan=='4'){
            return $db2->query("SELECT id_kapal, nama_kapal FROM tabel_kapal WHERE jenis_gps='IDP'");
        }else{
            return $db2->query("SELECT id_kapal, nama_kapal FROM tabel_kapal WHERE jenis_gps='IDP' AND id_pelanggan='$id_pelanggan'");
        }
    }

    public function ajax_tisa($id_pelanggan){
        $db2 = $this->load->database('db_idp', TRUE);
        if($id_pelanggan=='3' || $id_pelanggan=='4'){
            return $db2->query("SELECT id_kapal, nama_kapal FROM tabel_kapal WHERE jenis_gps='ESI'");
        }else{
            return $db2->query("SELECT id_kapal, nama_kapal FROM tabel_kapal WHERE jenis_gps='ESI' AND id_pelanggan='$id_pelanggan'");
        }
    }

}