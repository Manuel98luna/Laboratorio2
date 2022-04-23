<?php
class crud
{
    private $db;
    function __construct($conn)
    {
        $this->db = $conn;
    }
    //Muestra los datos en la tabla
    public function dataview($query)
    {
        $stmt = $this->db->prepare($query);
        $stmt->execute() > 0;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>
            <tr>
                <td><?php echo $row['autoID']; ?></td>
                <td><?php echo $row['matricula']; ?></td>
                <td><?php echo $row['marca']; ?></td>
                <td><?php echo $row['modelo']; ?></td>
                <td><?php echo $row['color']; ?></td>
                <td><?php echo $row['precio']; ?></td>
                <td>
                    <a href="edit_auto.php?edit_id=<?php echo $row['autoID'] ?>"> Editar</a>
                </td>
                <td>
                    <a href="eliminar_auto.php?delete_id=<?php echo $row['id'] ?>"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar</a>
                </td>
            </tr>

<?php

        }
    }

    public function update($id, $matricula, $marca, $modelo,$color, $precio)
    {
        try {
            $stmt = $this->db->prepare("UPDATE automovil SET matricula=:matricula
            WHERE autoID=:autoID");
            $stmt->bindparam(":matricula", $matricula);
            $stmt->bindparam(":marca", $marca);
            $stmt->bindparam(":modelo", $modelo);
            $stmt->bindparam(":color", $color);
            $stmt->bindparam(":precio", $precio);
            $stmt->bindparam(":autoID", $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function getID($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM automovil WHERE autoID=:autoID");
        $stmt->execute(array(":autoID" => $id));
        $editRow = $stmt->fetch(PDO::FETCH_ASSOC);
        return $editRow;
    }
    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM automovil WHERE autoID=:autoID");
        $stmt->bindparam(":autoID", $id);
        $stmt->execute();
        return true;
    }
}
