<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
    header('location: ../');
    exit();
}
require_once __DIR__ . '/Database.php';

class Purok extends Database
{
    function __construct()
    {
        parent::__construct();
    }

    function __destruct()
    {
        $this->con->close();
    }

    function getPurokAll()
    {
        $result = array();

        $query = "select * from puroks";
        $stmt = $this->con->stmt_init();

        if ($stmt->prepare($query)) {
            $stmt->execute();
            $que_result = $stmt->get_result();
            if ($que_result->num_rows > 0) {
                $result = $que_result->fetch_all(MYSQLI_ASSOC);
            } else {
                $result = null;
            }
        } else {
            $result = ['request_failed' => 'Failed to process request.'];
        }
        $stmt->close();
        return $result;
    }

    function getPurok_ByID($id)
    {
        $result = array();

        $query = "select * from puroks where id=?";
        $stmt = $this->con->stmt_init();

        if ($stmt->prepare($query)) {
            $stmt->bind_param('s', $id);
            $stmt->execute();
            $que_result = $stmt->get_result();
            if ($que_result->num_rows > 0) {
                $result = $que_result->fetch_all(MYSQLI_ASSOC);
            } else {
                $result = null;
            }
        } else {
            $result = ['request_failed' => 'Failed to process request.'];
        }
        $stmt->close();
        return $result;
    }

    function purok_Exist($value)
    {
        $result = array();

        $query = "select * from puroks where purok_name=?";
        $stmt = $this->con->stmt_init();

        if ($stmt->prepare($query)) {
            $stmt->bind_param('s', $value);
            $stmt->execute();
            $que_result = $stmt->get_result();
            if ($que_result->num_rows > 0) {
                $result = $que_result->fetch_all(MYSQLI_ASSOC);
            } else {
                $result = null;
            }
        } else {
            $result = ['request_failed' => 'Failed to process request.'];
        }
        $stmt->close();
        return $result;
    }

    function store($purok)
    {
        $query = "insert into puroks (purok_name, last_user)values(?,?)";
        $stmt = $this->con->stmt_init();

        if ($stmt->prepare($query)) {
            $stmt->bind_param('ss', $purok, $_SESSION['auth'][0]['username']);
            $stmt->execute();
            if ($stmt->affected_rows == 1) {
                $stmt->close();

                $activity_log = new ActivityLog;
                $log = array(
                    'username' => $_SESSION['auth'][0]['username'],
                    'action' => 'Add New Purok',
                    'content' => 'Purok: ' . $purok,
                    'changes' => ''
                );
                $activity_log->storeLog($log);
                return true;
            } else {
                $stmt->close();
                return false;
            }
        } else {
            $stmt->close();
            $result = array('request_failed' => 'Failed to process request.');
            return $result;
            exit();
        }
    }

    function update(array $values)
    {
        $query = "update puroks set purok_name=?, updated_at=now(), last_user=? where id=?";
        $stmt = $this->con->stmt_init();

        $current_data = $this->getPurok_ByID($values['id']);

        if ($stmt->prepare($query)) {
            $stmt->bind_param('ssi', $values['purok_name'], $_SESSION['auth'][0]['username'], $values['id']);
            $stmt->execute();
            if ($stmt->affected_rows == 1) {
                $stmt->close();

                $activity_log = new ActivityLog;
                $log = array(
                    'username' => $_SESSION['auth'][0]['username'],
                    'action' => 'Updated Purok',
                    'content' => 'Purok: ' . $current_data[0]['purok_name'],
                    'changes' => 'Purok: ' . $values['purok_name']
                );
                $activity_log->storeLog($log);
                return true;
            } else {
                $stmt->close();
                return false;
            }
        } else {
            $stmt->close();
            $result = array('request_failed' => 'Failed to process request.');
            return $result;
            exit();
        }
    }
}
