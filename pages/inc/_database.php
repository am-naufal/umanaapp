<?php
function __database($host = "localhost", $user = "root", $pass = "", $db = "absensi")
{
    $sambung = new mysqli($host, $user, $pass, $db);
    if (!$sambung) {
        echo "sambungan gagal" . $sambung->error;
        exit;
    }
    return $sambung;
}
function __get_fields($sambung, $table)
{
    $get_fields = $sambung->query("select * from $table");
    if ($get_fields) {
        $fields = array();
        while ($rfields = $get_fields->fetch_field()) {
            $fields[] = $rfields->name;
        }
        return $fields;
    } else {
        return "gagal mengambil fields" . $sambung->error;
    }
}
function __simpan($sambung, $table, $data)
{
    if (!is_array($data)) {
        return "error, format tidak valid";
    }
    $query = "INSERT INTO $table (";
    foreach ($data as $key => $value) {
        $query .= $key;
        if ($key != array_key_last($data)) {
            $query .= ",";
        }
    }
    $query .= ") VALUES (";
    foreach ($data as $k => $v) {
        $query .= "'" . $v . "'";
        if ($k != array_key_last($data)) {
            $query .= ",";
        }
    }
    $query .= ")";
    $data = $sambung->query($query);

    if (!$data) {
        return false;
    } else {
        return true;
    }
}
function __ambil($sambung, $table, $fields = null, $where = null, $join = null, $orderby = null)
{
    $query = "SELECT";
    if ($fields == null) {
        $query .= "*";
    } else {
        $query .= $fields;
    }
    $query .= "FROM $table";
    if ($join != null) {
        if (is_array($join)) {
            foreach ($join as $j) {
                $query .= " " . $j;
            }
        }
    }
    if ($where != null) {
        if (is_array($where)) {
            $query .= " WHERE ";
            foreach ($where as $k => $w) {
                $query .= $k . " = '" . $w . "'";
                if ($k != array_key_last($where)) {
                    $query .= " AND ";
                }
            }
        }
    }
    if ($orderby != null) {
        $query .= " ORDER BY " . $orderby;
    }

    $data = $sambung->query($query);

    if (!$data) {
        return false;
    } else {
        return $data;
    }
}
function __delete($sambung, $table, $where)
{
    $query = "DELETE FROM $table";
    if (is_array($where)) {
        $query .= " WHERE ";
        foreach ($where as $k => $w) {
            $query .= $k . " = '" . $w . "'";
            if ($k != array_key_last($where)) {
                $query .= " AND ";
            }
        }
    } else {
        return false;
    }
    $data = $sambung->query($query);
    if (!$$data) {
        return false;
    } else {
        return $data;
    }
}
function __update($sambung, $table, $data, $where = null)
{
    $query = "UPDATE $table SET ";
    if (!is_array($data)) {
        return "format tidak valid";
    } else {
        foreach ($data as $k => $v) {
            $query .= $k . " = '" . $v . "'";
            if ($k != array_key_last($data)) {
                $query .= ", ";
            }
        }
    }
    if ($where != null) {
        if (is_array($where)) {
            $query .= " WHERE ";
            foreach ($where as $k => $w) {
                $query .= $k . " = '" . $w . "'";
                if ($k != array_key_last($where)) {
                    $query .= " AND ";
                }
            }
        } else {
            return false;
        }
    }
    $data = $sambung->query($query);
    if (!$data) {
        return false;
    } else {
        return true;
    }
}
