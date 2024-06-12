<div class="container mx-auto relative">
  <form class="mx-auto w-max" id="form-pendaftaran">
    <ul class="steps sticky top-0 py-2 mb-8 z-10 bg-base-100">
      <li class="step step-primary">Data Peserta Didik</li>
      <li class="step">Data Orang Tua / Wali</li>
      <li class="step">Data Sekolah Asal</li>
      <li class="step">Konfirmasi Data</li>
    </ul>
    <div data-step="1">
      <div class="bg-primary rounded-full p-4 my-4 sticky top-32 shadow-lg">
        <h2 class="text-primary-content text-xl font-bold text-center">Data Siswa</h2>
      </div>
      <label class="form-control w-full">
        <div class="label">
          <span class="label-text before:text-[var(--fallback-p,oklch(var(--p)/1))] before:content-['*'] before:mr-1">Nomor Induk Siswa Nasional</span>
        </div>
        <input type="number" placeholder="NISN" class="input input-bordered w-full" name="nisn" required />
        <div class="label">
          <span class="label-text-alt">Sesuai dengan data dari web <a href="https://nisn.data.kemdikbud.go.id" class="btn-link">nisn.data.kemdikbud.go.id</a> </span>
        </div>
      </label>
      <label class="form-control w-full">
        <div class="label">
          <span class="label-text before:text-[var(--fallback-p,oklch(var(--p)/1))] before:content-['*'] before:mr-1">Nomor Induk Kependudukan</span>
        </div>
        <input type="number" placeholder="NIK" class="input input-bordered w-full" name="nik" required />
        <div class="label">
          <span class="label-text-alt">Sesuai dengan Kartu Keluarga (KK)</span>
        </div>
      </label>
      <label class="form-control w-full">
        <div class="label">
          <span class="label-text before:text-[var(--fallback-p,oklch(var(--p)/1))] before:content-['*'] before:mr-1">Nama Lengkap</span>
        </div>
        <input type="text" placeholder="Nama" class="input input-bordered w-full" name="nama" required />
        <div class="label">
          <span class="label-text-alt">Sesuai dengan ijazah SMP</span>
        </div>
      </label>
      <div class="form-control w-full">
        <div class="label">
          <span class="label-text before:text-[var(--fallback-p,oklch(var(--p)/1))] before:content-['*'] before:mr-1">Jenis Kelamin</span>
        </div>
        <label class="label cursor-pointer justify-start gap-2" for="jenis_kelamin_l">
          <input type="radio" name="jenis_kelamin" class="radio radio-primary" value="l" id="jenis_kelamin_l" required />
          <span class="label-text">Laki-laki</span>
        </label>
        <label class="label cursor-pointer justify-start gap-2" for="jenis_kelamin_p">
          <input type="radio" name="jenis_kelamin" class="radio radio-primary" value="p" id="jenis_kelamin_p" required />
          <span class="label-text">Perempuan</span>
        </label>
      </div>
      <label class="form-control w-full">
        <div class="label">
          <span class="label-text before:text-[var(--fallback-p,oklch(var(--p)/1))] before:content-['*'] before:mr-1">Tempat Kelahiran</span>
        </div>
        <input type="text" placeholder="Dimana?" class="input input-bordered w-full" name="tempat_kelahiran" required />
      </label>
      <label class="form-control w-full">
        <div class="label">
          <span class="label-text before:text-[var(--fallback-p,oklch(var(--p)/1))] before:content-['*'] before:mr-1">Tanggal Kelahiran</span>
        </div>
        <input type="date" placeholder="Kapan?" class="input input-bordered w-full" name="tanggal_lahir" required />
      </label>
      <label class="form-control w-full">
        <div class="label">
          <span class="label-text before:text-[var(--fallback-p,oklch(var(--p)/1))] before:content-['*'] before:mr-1">Agama</span>
        </div>
        <select name="id_agama" class="select select-bordered" required>
          <option disabled selected value="">Pilih agama yang dianut</option>
          <?php foreach ($agama as $key => $value) : ?>
            <option value="<?= $value->id ?>"><?= $value->nama ?></option>
          <?php endforeach; ?>
        </select>
      </label>
      <div class="form-control w-full">
        <div class="label">
          <span class="label-text before:text-[var(--fallback-p,oklch(var(--p)/1))] before:content-['*'] before:mr-1">Status dalam Keluarga</span>
        </div>
        <label class="label cursor-pointer justify-start gap-2" for="anak_kandung">
          <input type="radio" name="status_dalam_keluarga" class="radio radio-primary" value="kandung" id="anak_kandung" required />
          <span class="label-text">Anak Kandung</span>
        </label>
        <label class="label cursor-pointer justify-start gap-2" for="anak_angkat">
          <input type="radio" name="status_dalam_keluarga" class="radio radio-primary" value="angkat" id="anak_angkat" required />
          <span class="label-text">Anak Angkat</span>
        </label>
      </div>
      <label class="form-control w-full">
        <div class="label">
          <span class="label-text before:text-[var(--fallback-p,oklch(var(--p)/1))] before:content-['*'] before:mr-1">Alamat</span>
        </div>
        <input type="text" placeholder="Alamat Calon Siswa" class="input input-bordered w-full" name="alamat" required />
      </label>
      <label class="form-control w-full">
        <div class="label">
          <span class="label-text before:text-[var(--fallback-p,oklch(var(--p)/1))] before:content-['*'] before:mr-1">No. Handphone</span>
        </div>
        <input type="tel" placeholder="No. Handphone Calon Siswa" class="input input-bordered w-full" name="no_hp" required />
      </label>
    </div>
    <div data-step="2" class="hidden">
      <div class="bg-primary rounded-full p-4 my-4 sticky top-32 shadow-lg">
        <h2 class="text-primary-content text-xl font-bold text-center">Data Ayah</h2>
      </div>
      <label class="form-control w-full">
        <div class="label">
          <span class="label-text before:text-[var(--fallback-p,oklch(var(--p)/1))] before:content-['*'] before:mr-1">Nama Lengkap</span>
        </div>
        <input type="text" placeholder="Nama Lengkap Ayah" class="input input-bordered w-full" name="nama_ayah" required />
      </label>
      <label class="form-control w-full">
        <div class="label">
          <span class="label-text before:text-[var(--fallback-p,oklch(var(--p)/1))] before:content-['*'] before:mr-1">Pendidikan</span>
        </div>
        <select name="id_pendidikan_ayah" class="select select-bordered" required>
          <option disabled selected value="">Pilih Pendidikan Ayah</option>
          <?php foreach ($pendidikan as $key => $value) : ?>
            <option value="<?= $value->id ?>"><?= $value->nama ?></option>
          <?php endforeach; ?>
        </select>
      </label>
      <label class="form-control w-full">
        <div class="label">
          <span class="label-text before:text-[var(--fallback-p,oklch(var(--p)/1))] before:content-['*'] before:mr-1">Pekerjaan</span>
        </div>
        <select name="id_pekerjaan_ayah" class="select select-bordered" required>
          <option disabled selected value="">Pilih Pekerjaan Ayah</option>
          <?php foreach ($pekerjaan as $key => $value) : ?>
            <option value="<?= $value->id ?>"><?= $value->nama ?></option>
          <?php endforeach; ?>
        </select>
      </label>
      <label class="form-control w-full">
        <div class="label">
          <span class="label-text before:text-[var(--fallback-p,oklch(var(--p)/1))] before:content-['*'] before:mr-1">Penghasilan</span>
        </div>
        <input type="number" placeholder="Berapa Penghasilan Ayah?" class="input input-bordered w-full" name="penghasilan_ayah" required />
        <div class="label">
        </div>
      </label>
      <label class="form-control w-full">
        <div class="label">
          <span class="label-text before:text-[var(--fallback-p,oklch(var(--p)/1))] before:content-['*'] before:mr-1">No. Handphone</span>
        </div>
        <input type="tel" placeholder="No. Handphone Ayah" class="input input-bordered w-full" name="no_hp_ayah" required />
      </label>
      <div class="bg-primary rounded-full p-4 my-4 sticky top-32 shadow-lg">
        <h2 class="text-primary-content text-xl font-bold text-center">Data Ibu</h2>
      </div>
      <label class="form-control w-full">
        <div class="label">
          <span class="label-text before:text-[var(--fallback-p,oklch(var(--p)/1))] before:content-['*'] before:mr-1">Nama Lengkap</span>
        </div>
        <input type="text" placeholder="Nama Lengkap Ibu" class="input input-bordered w-full" name="nama_ibu" required />
      </label>
      <label class="form-control w-full">
        <div class="label">
          <span class="label-text before:text-[var(--fallback-p,oklch(var(--p)/1))] before:content-['*'] before:mr-1">Pendidikan</span>
        </div>
        <select name="id_pendidikan_ibu" class="select select-bordered" required>
          <option disabled selected value="">Pilih Pendidikan Ibu</option>
          <?php foreach ($pendidikan as $key => $value) : ?>
            <option value="<?= $value->id ?>"><?= $value->nama ?></option>
          <?php endforeach; ?>
        </select>
      </label>
      <label class="form-control w-full">
        <div class="label">
          <span class="label-text before:text-[var(--fallback-p,oklch(var(--p)/1))] before:content-['*'] before:mr-1">Pekerjaan</span>
        </div>
        <select name="id_pekerjaan_ibu" class="select select-bordered" required>
          <option disabled selected value="">Pilih Pekerjaan Ibu</option>
          <?php foreach ($pekerjaan as $key => $value) : ?>
            <option value="<?= $value->id ?>"><?= $value->nama ?></option>
          <?php endforeach; ?>
        </select>
      </label>
      <label class="form-control w-full">
        <div class="label">
          <span class="label-text before:text-[var(--fallback-p,oklch(var(--p)/1))] before:content-['*'] before:mr-1">Penghasilan</span>
        </div>
        <input type="number" placeholder="Berapa Penghasilan Ibu?" class="input input-bordered w-full" name="penghasilan_ibu" required />
        <div class="label">
        </div>
      </label>
      <label class="form-control w-full">
        <div class="label">
          <span class="label-text before:text-[var(--fallback-p,oklch(var(--p)/1))] before:content-['*'] before:mr-1">No. Handphone</span>
        </div>
        <input type="tel" placeholder="No. Handphone Ibu" class="input input-bordered w-full" name="no_hp_ibu" required />
      </label>
      <div class="bg-primary rounded-full p-4 my-4 sticky top-32 shadow-lg">
        <h2 class="text-primary-content text-xl font-bold text-center">Data Wali</h2>
      </div>
      <label class="form-control w-full">
        <div class="label">
          <span class="label-text">Nama Lengkap</span>
        </div>
        <input type="text" placeholder="Nama Lengkap Wali" class="input input-bordered w-full" name="nama_wali" />
      </label>
      <label class="form-control w-full">
        <div class="label">
          <span class="label-text">Pendidikan</span>
        </div>
        <select name="id_pendidikan_wali" class="select select-bordered">
          <option disabled selected>Pilih Pendidikan Wali</option>
          <?php foreach ($pendidikan as $key => $value) : ?>
            <option value="<?= $value->id ?>"><?= $value->nama ?></option>
          <?php endforeach; ?>
        </select>
      </label>
      <label class="form-control w-full">
        <div class="label">
          <span class="label-text">Pekerjaan</span>
        </div>
        <select name="id_pekerjaan_wali" class="select select-bordered">
          <option disabled selected>Pilih Pekerjaan Wali</option>
          <?php foreach ($pekerjaan as $key => $value) : ?>
            <option value="<?= $value->id ?>"><?= $value->nama ?></option>
          <?php endforeach; ?>
        </select>
      </label>
      <label class="form-control w-full">
        <div class="label">
          <span class="label-text">Penghasilan</span>
        </div>
        <input type="number" placeholder="Berapa Penghasilan Wali?" class="input input-bordered w-full" name="penghasilan_wali" />
        <div class="label">
        </div>
      </label>
      <label class="form-control w-full">
        <div class="label">
          <span class="label-text">No. Handphone</span>
        </div>
        <input type="tel" placeholder="No. Handphone Wali" class="input input-bordered w-full" name="no_hp_wali" />
      </label>
    </div>
    <div data-step="3" class="hidden">
      <div class="bg-primary rounded-full p-4 my-4 sticky top-32 shadow-lg">
        <h2 class="text-primary-content text-xl font-bold text-center">Data Sekolah Asal</h2>
      </div>
      <label class="form-control w-full">
        <div class="label">
          <span class="label-text before:text-[var(--fallback-p,oklch(var(--p)/1))] before:content-['*'] before:mr-1">Sekolah Asal</span>
        </div>
        <select name="id_sekolah_asal" class="select select-bordered" required>
          <option disabled selected value="">Pilih Sekolah Asal</option>
          <?php foreach ($asal_sekolah as $key => $value) : ?>
            <option value="<?= $value->id ?>"><?= $value->nama ?></option>
          <?php endforeach; ?>
        </select>
      </label>
      <label class="form-control w-full">
        <div class="label">
          <span class="label-text before:text-[var(--fallback-p,oklch(var(--p)/1))] before:content-['*'] before:mr-1">Tahun Lulus</span>
        </div>
        <input type="number" placeholder="Tahun Lulus" class="input input-bordered w-full" name="tahun_lulus" required />
      </label>
    </div>
    <div data-step="4" class="hidden">
      <div class="bg-primary rounded-full p-4 my-4 sticky top-32 shadow-lg">
        <h2 class="text-primary-content text-xl font-bold text-center">Konfirmasi Data</h2>
      </div>
      <div class="form-control w-full">
        <div class="label">
          <span class="label-text before:text-[var(--fallback-p,oklch(var(--p)/1))] before:content-['*'] before:mr-1">Apakah data calon peserta didik sudah sesuai dan lengkap?</span>
        </div>
        <label class="label cursor-pointer justify-start gap-2" for="konfirmasi">
          <input type="checkbox" name="konfirmasi" class="radio radio-primary" value="ya" id="konfirmasi" required />
          <span class="label-text">Ya, data sudah sesuai dan lengkap.</span>
        </label>
      </div>
    </div>
    <div class="step-action sticky bottom-0 mt-8 z-10 bg-base-100 py-2">
      <button class="btn btn-secondary" type="button" id="prev" disabled>Sebelumnya</button>
      <button class="btn btn-primary" type="button" id="next">Selanjutnya</button>
      <button class="btn btn-primary" type="submit" id="submit" disabled>Submit</button>
    </div>
  </form>
</div>
<script>
  let current_step = 1;
  document.getElementById("next").addEventListener("click", () => {
    // trigger required validation
    const step_children = document.querySelector(`[data-step="${current_step}"]`).querySelectorAll("[required]")

    for (let i = 0; i < step_children.length; i++) {
      if (!step_children[i].checkValidity()) {
        step_children[i].reportValidity();
        return;
      }
    }






    // auto scroll to top
    window.scrollTo(0, 0);
    current_step++;

    document.querySelector(".steps").querySelectorAll("li").forEach((step, index) => {
      if (index < current_step) {
        step.classList.add("step-primary");
      } else {
        step.classList.remove("step-primary");
      }
    });
    document.querySelector(`[data-step="${current_step - 1}"]`).style.display = "none";
    document.querySelector(`[data-step="${current_step}"]`).style.display = "block";
    document.getElementById("prev").disabled = false;
    if (current_step == 4) {
      document.getElementById("next").disabled = true;
      document.getElementById("submit").disabled = false;
    }
  });

  document.getElementById("prev").addEventListener("click", () => {
    window.scrollTo(0, 0);
    current_step--;

    document.querySelector(".steps").querySelectorAll("li").forEach((step, index) => {
      if (index < current_step) {
        step.classList.add("step-primary");
      } else {
        step.classList.remove("step-primary");
      }
    });

    document.querySelector(`[data-step="${current_step + 1}"]`).style.display = "none";
    document.querySelector(`[data-step="${current_step}"]`).style.display = "block";
    document.getElementById("next").disabled = false;
    if (current_step == 1) {
      document.getElementById("prev").disabled = true;
    }
  });

  const formPendaftaran = document.getElementById("form-pendaftaran")

  formPendaftaran.addEventListener("submit", async (ev) => {
    ev.preventDefault();
    const formData = new FormData(formPendaftaran)

    const response = await fetch("/api/pendaftaran", {
      method: "POST",
      body: JSON.stringify(Object.fromEntries(formData)),
      headers: {
        "Content-Type": "application/json"
      }
    })

    const result = await response.json()

    if (result.status == "success") {
      alert("Data berhasil disimpan!")
      window.location.href = "/"
    } else {
      alert("Data gagal disimpan!")
    }



  });
</script>