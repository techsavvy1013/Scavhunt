<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Notification_model extends CI_Model
{
    private $_tablename = 'notifications';

    public function insertNotification($playerId, $msg)
    {
        $newMsg = array(
            'player_id' => $playerId,
            'msg' => $msg
        );
        $this->db->insert($this->_tablename, $newMsg);
    }

    public function getAllNotifications($playerId)
    {
        $this->db->where('player_id', $playerId);
        $query = $this->db->get($this->_tablename);
        return $query->result();
    }

    public function checkAsRead($playerId)
    {
        $newMsg = array(
            'is_read' => 1,
        );
        $this->db->where('player_id', $playerId);
        $this->db->update($this->_tablename, $newMsg);
        return TRUE;
    }
}
