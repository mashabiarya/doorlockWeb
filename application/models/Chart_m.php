<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Chart_m extends CI_Model
{

    /* CHART 1
    SELECT nip, COUNT(id) FROM card_log GROUP BY nip

    CHART 2
    SELECT nip, COUNT(id) FROM card_log GROUP BY nip

    CHART 3 (DEVICE 1)
    SELECT rssi, snr, `timestamp` FROM card_log WHERE macAddr = "24:62:AB:FF:7E:1C" ORDER BY `timestamp` DESC LIMIT 20

    CHART 3 (DEVICE 2)
    SELECT rssi, snr, `timestamp` FROM card_log WHERE macAddr = "58:BF:25:8B:EA:2C" ORDER BY `timestamp` DESC LIMIT 20 */

    public function get($id = null)
    {
        return $this->db->get('card_log')->result();
    }

    public function get_absensi(){
      $header = []; $value = [];
      $data = $this->db->select('nip, COUNT(id) AS value')->group_by('nip')->get('card_log')->result_array();

      foreach ($data as $d) {
        $header[] = $d['nip'];
        $value[] = intval($d['value']);
      }

      return [
        'header' => $header,
        'value' => $value
      ];
    }

    public function get_rssi_snr_mesin($mac_mesin) {
      $header = []; $rssi = []; $snr = [];

      $this->db->select('rssi, snr, `timestamp`');
      $this->db->where('macAddr', $mac_mesin);
      $this->db->order_by('timestamp', 'desc')->limit(20, 0);
      $data = $this->db->get('card_log')->result_array();

      foreach ($data as $d) {
        $header[] = $d['timestamp'];
        $rssi[] = intval($d['rssi']);
        $snr[] = intval($d['snr']);
      }

      return [
        'header' => $header,
        'value' => [$rssi, $snr]
      ];
    }
}
