<!DOCTYPE html>
<html>

<head>
  <title>Surat Masuk</title>
  <style type="text/css">
    #outtable {
      padding: 20px;
      border: 1px solid #e3e3e3;
      width: 920px;
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
    <h5>AGENDA SURAT MASUK</h5>

  </center>
  <div id="outtable">
    <table>
      <thead>
        <tr>
          <th class="short">No</th>
          <th class="normal">Tanggal Surat</th>
          <th class="normal">Nomor Surat</th>
          <th class="normal">Tujuan Surat</th>
          <th class="normal">Uraian/Perihal</th>
          <th class="normal">Pengirim</th>

        </tr>
      </thead>
      <tbody>

        <?php if (is_array($surat_masuk)) : ?>
          <?php
            $no = 1;
            foreach ($surat_masuk as $key => $value) : ?>


            <tr>
              <td><?php echo $no++ ?></td>
              <td><?php 
              $tanggal = $value->tanggal_masuk ;
              echo 

              date("d F Y", strtotime($tanggal));
              
              ?></td>
              <td><?php echo $value->no_surat ?></td>
              <td><?php echo $value->penerima ?></td>
              <td><?php echo $value->perihal ?></td>
              <td><?php echo $value->pengirim ?></td>

            </tr>
          <?php endforeach; ?>
        <?php endif; ?>


      </tbody>
    </table>
  </div>
</body>

</html>