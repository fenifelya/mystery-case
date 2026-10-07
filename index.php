<?php
include "services/config.php";

// Mengambil data dari tabel cases
$query_cases = "SELECT * FROM cases";
$result_cases = mysqli_query($conn, $query_cases);

// Mengambil data dari tabel suspects
$query_suspects = "SELECT * FROM suspects";
$result_suspects = mysqli_query($conn, $query_suspects);

// Mengambil data dari tabel case_suspects
$query_relations = "
    SELECT 
        case_suspects.id_case_suspect,
        cases.case_name,
        suspects.suspect_name,
        case_suspects.role,
        case_suspects.evidence
    FROM case_suspects
    JOIN cases ON case_suspects.id_case = cases.id_case
    JOIN suspects ON case_suspects.id_suspect = suspects.id_suspect
";
$result_relations = mysqli_query($conn, $query_relations);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mystery Case</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header>
        <h1>🕵️ Mystery Case</h1>
        <p>Uncover the truth behind every case.</p>
    </header>

    <nav>
        <a href="#cases">Cases</a>
        <a href="#suspects">Suspects</a>
        <a href="#relations">Case & Suspects</a>
    </nav>

    <main>

        <!-- BAGIAN KASUS -->
        <section id="cases">
            <h2>🔎 Daftar Kasus</h2>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Kasus</th>
                            <th>Lokasi</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Deskripsi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while ($case = mysqli_fetch_assoc($result_cases)) { ?>
                            <tr>
                                <td><?php echo $case['id_case']; ?></td>
                                <td><?php echo $case['case_name']; ?></td>
                                <td><?php echo $case['location']; ?></td>
                                <td><?php echo $case['case_date']; ?></td>
                                <td><?php echo $case['status']; ?></td>
                                <td><?php echo $case['description']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </section>


        <!-- BAGIAN TERSANGKA -->
        <section id="suspects">
            <h2>🕵️ Daftar Tersangka</h2>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Umur</th>
                            <th>Pekerjaan</th>
                            <th>Alamat</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while ($suspect = mysqli_fetch_assoc($result_suspects)) { ?>
                            <tr>
                                <td><?php echo $suspect['id_suspect']; ?></td>
                                <td><?php echo $suspect['suspect_name']; ?></td>
                                <td><?php echo $suspect['age']; ?></td>
                                <td><?php echo $suspect['occupation']; ?></td>
                                <td><?php echo $suspect['address']; ?></td>
                                <td><?php echo $suspect['status']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </section>


        <!-- BAGIAN RELASI -->
        <section id="relations">
            <h2>🔗 Hubungan Kasus & Tersangka</h2>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Kasus</th>
                            <th>Tersangka</th>
                            <th>Peran</th>
                            <th>Bukti</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while ($relation = mysqli_fetch_assoc($result_relations)) { ?>
                            <tr>
                                <td><?php echo $relation['id_case_suspect']; ?></td>
                                <td><?php echo $relation['case_name']; ?></td>
                                <td><?php echo $relation['suspect_name']; ?></td>
                                <td><?php echo $relation['role']; ?></td>
                                <td><?php echo $relation['evidence']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </section>

    </main>

    <footer>
        <p>&copy; 2026 Mystery Case</p>
    </footer>

</body>
</html>