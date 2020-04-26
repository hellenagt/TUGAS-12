<?php
include('koneksi.php');
require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$query = mysqli_query($koneksi,"select * from validasi");
$html = '<center><h3>Daftar Nama Siswa</h3></center><hr/><br/>';
$html .= '<table border="1" width="100%">
 <tr>
<th>No</th>
<th>Tanggal</th> 
<th>Nama Lengkap</th> 
<th>Jenis Kelamin </th>
<th>NISN</th> 
<th>NIK</th>
<th>Tempat Lahir</th>
<th>Tanggal Lahir</th>
<th>No Registrasi Akte</th>
<th>Agama</th>
<th>Kewarganegaraan</th>
<th>Berkebutuhan Khusus</th>
<th>Alamat</th>
<th>RT</th>
<th>RW</th>
<th>Dusun</th>
<th>Desa</th>
<th>Kecamatan</th>
<th>Kode Pos</th>
<th>Lintang</th>
<th>Bujur</th>
<th>Tempat Tinggal</th>
<th>Moda Transportasi</th>
<th>No KKS</th>
<th>Anak ke-</th>
<th>KPS/PKH</th>
<th>No KPS</th>
 </tr>';
$no = 1;
while($row = mysqli_fetch_array($query))
{
 $html .= "<tr>
 <td>".$no."</td>
 <td>".$row['tanggal']."</td>
 <td>".$row['nama']."</td>
 <td>".$row['jk']."</td>
 <td>".$row['nisn']."</td>
 <td>".$row['nik']."</td>
 <td>".$row['tmptlahir']."</td>
 <td>".$row['tgllahir']."</td>
 <td>".$row['noregeris']."</td>
 <td>".$row['agama']."</td>
 <td>".$row['kwn']."</td>
 <td>".$row['kebutuhan']."</td>
 <td>".$row['alamat']."</td>
 <td>".$row['rt']."</td>
 <td>".$row['rw']."</td>
 <td>".$row['dusun']."</td>
 <td>".$row['kelurahan']."</td>
 <td>".$row['kecamatan']."</td>
 <td>".$row['kodepos']."</td>
 <td>".$row['lintang']."</td>
 <td>".$row['bujur']."</td>
 <td>".$row['tmpttinggal']."</td>
 <td>".$row['transportasi']."</td>
 <td>".$row['nokks']."</td>
 <td>".$row['anak']."</td>
 <td>".$row['kps']."</td>
 <td>".$row['nokps']."</td>
 </tr>";
 $no++;
}
$html .= "</html>";
$dompdf->loadHtml($html);
$dompdf->setPaper('a1', 'landscape');
$dompdf->render();
$dompdf->stream('laporan_siswa.pdf');
?>