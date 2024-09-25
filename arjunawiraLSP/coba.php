<?php
// ... (existing PHP code)

// After fetching results
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $stokClass = ($row['stok'] < 3) ? 'class="out-of-stock"' : '';
        $alertScript = ($row['stok'] === 0) ? "alert('Stok untuk " . addslashes($row['nama_barang']) . " adalah 0. Harap segera restock!');" : '';
        
        echo "<tr $stokClass>";
        echo "<td>" . htmlspecialchars($row['nama_barang']) . "</td>"; 
        echo "<td>" . htmlspecialchars($row['jenis_barang']) . "</td>";
        echo "<td>" . htmlspecialchars($row['stok']) . "</td>";
        echo "<td>" . htmlspecialchars($row['lokasi']) . "</td>";
        echo "<td>" . htmlspecialchars($row['harga']) . "</td>";
        echo "<td>" . htmlspecialchars($row["serial_number"]) . "</td>";
        echo "<td class='action-links'><a class='update' href='update.php?id=" . $row['id_inv'] . "'>Update</a>
              <a class='delete' href='?delete=" . $row['id_inv'] . "' onclick='return confirm(\"Beneran?\");'>Delete</a></td>";
        echo "</tr>";
        echo "<script>$alertScript</script>"; // Output the alert script if stock is 0
    }
} else {
    echo "<tr><td colspan='7'>Tidak ada data</td></tr>";
}
?>
