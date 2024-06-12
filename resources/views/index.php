<!DOCTYPE html>
<html lang="en" data-theme="luxury">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:slnt,wght@-10..0,100..900&family=Mochiy+Pop+One&family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="css/daisyui.css" />
  <script src="js/tailwind.js"></script>

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
  <?php
  if (isset($_GET["aksi"])) {
    switch ($_GET["aksi"]) {
      case "register":
        include "register.php";
        break;

      default:
        include "home.php";
    }
  } else {
    include "home.php";
  }
  ?>


</body>

</html>