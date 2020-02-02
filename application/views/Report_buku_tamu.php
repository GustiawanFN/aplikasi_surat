<!DOCTYPE html>
<html>

<head>
  <title>Buku Tamu</title>
  <style type="text/css">
    #outtable {
      padding: 20px;
      border: 1px solid #e3e3e3;
      width: 1000px;
      border-radius: 5px;
    }

    .short {
      width: 50px;
    }

    .normal {
      width: 150px;
    }

    table {
      border-collapse: collapse;
      font-family: arial;
      color: #5E5B5C;
    }

    thead th {
      text-align: left;
      padding: 10px;
    }

    tbody td {
      border-top: 1px solid #e3e3e3;
      padding: 10px;
    }

    tbody tr:nth-child(even) {
      background: #F6F5FA;
    }

    tbody tr:hover {
      background: #EAE9F5
    }
  </style>
</head>

<body>

  <center>

    <h2>DESA CINEUMBEUY</h2>
    <h4>TAHUN 2019</h4>
    <h5>BUKU TAMU</h5>

  </center>
  <div id="outtable">
    <table>
      <thead>
        <tr>
          <th class="short">No</th>
          <th class="normal">Tanggal</th>
          <th class="normal">Nama</th>
          <th class="normal">Pekerjaan</th>
          <th class="normal">Alamat</th>
          <th class="normal">Keperluan</th>
          <th class="normal">Saran</th>

        </tr>
      </thead>
      <tbody>

        <?php if (is_array($buku_tamu)) : ?>
          <?php
            $no = 1;
            foreach ($buku_tamu as $key => $value) : ?>


            <tr>
              <td><?php echo $no++ ?></td>
              <td><?php 
              $tanggal = $value->tanggal ;
              echo 

              date("d F Y", strtotime($tanggal));
              
              ?></td>
              <td><?php echo $value->nama_tamu ?></td>
              <td><?php echo $value->pekerjaan_tamu ?></td>
              <td><?php echo $value->alamat_tamu ?></td>
              <td><?php echo $value->keperluan ?></td>
              <td><?php echo $value->saran_tamu ?></td>

            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</body>

</html>