<!DOCTYPE html>
<html lang="en" data-theme="luxury">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Result</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:slnt,wght@-10..0,100..900&family=Mochiy+Pop+One&family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="css/daisyui.css" />
  <script src="js/tailwind.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.6/css/dataTables.dataTables.css" />
  <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/2.0.6/js/dataTables.js"></script>
  <style>
    .noto-sans-jp-bold {
      font-family: "Noto Sans JP", sans-serif;
      font-optical-sizing: auto;
      font-weight: 700;
      font-style: normal;
    }

    .mochiy-pop-one-regular {
      font-family: "Mochiy Pop One", sans-serif;
      font-weight: 400;
      font-style: normal;
    }

    .preview {
      background-image: repeating-linear-gradient(45deg,
          var(--fallback-b1, oklch(var(--b1))),
          var(--fallback-b1, oklch(var(--b1))) 13px,
          var(--fallback-b2, oklch(var(--b2))) 13px,
          var(--fallback-b2, oklch(var(--b2))) 14px);
      background-size: 40px 40px;
    }
  </style>
</head>

<body class="preview min-h-[100dvh]">
  <div class="container mx-auto">

    <table id="result" data-order='[[ 7, "desc" ]]'>
      <thead>
        <tr>
          <td>ID</td>
          <td>Nama</td>
          <td>NISN</td>
          <td>Status</td>
          <td>Asal Sekolah</td>
          <td>Agama</td>
          <td>Jenis Kelamin</td>
          <td>Tanggal Daftar</td>
          <td>Ibu</td>
          <td>Ayah</td>
          <td>Wali</td>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($data as $key => $value) {
        ?>
          <tr>
            <td><?= $value->id ?></td>
            <td><?= $value->nama ?></td>
            <td><?= $value->nisn ?></td>
            <td><?= $value->status ?></td>
            <td><?= $value->asal_sekolah ?></td>
            <td><?= $value->agama ?></td>
            <td><?= $value->jenis_kelamin ?></td>
            <td><?= $value->tanggal_daftar ?></td>
            <td><?= $value->ibu ?></td>
            <td><?= $value->ayah ?></td>
            <td><?= $value->wali ?></td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>

  </div>
  <script>
    let table = new DataTable('#result', {
      responsive: true,
    });
  </script>
</body>

</html>