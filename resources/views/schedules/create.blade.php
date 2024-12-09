@extends('layouts.main')
@push('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/monthSelect/style.css" />
@endpush
@section('content')

<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold text-center mb-4">Add Schedule</h1>
    <form method="POST">
        @csrf
        <div>
            <div>
                <label for="personnel_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an
                    option</label>
                <select id="personnel_id" name="personnel_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <option value="">-- Select Name --</option>
                    @foreach ($personnels as $personnel)
                        
                    <option value="{{ $personnel->id }}">{{ $personnel->name }}</option>
                    @endforeach
                    
                </select>
           
            </div>
            <div class="mb-4">
                <label for="monthPicker" class="block text-lg font-medium text-gray-700">
                    Bulan dan Tahun:
                </label>
                <input id="monthPicker" type="text" name="date"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Pilih bulan dan tahun" />
            </div>
        </div>

        <h2 class="text-xl font-semibold text-gray-700 mb-2">Jadwal</h2>
        <div id="checkboxContainer" class="w-full md:w-[50%] grid grid-cols-5 md:grid-cols-7 gap-4"></div>

        <button type="submit" class="float-right bg-blue-500 px-4 py-3 mb-4 text-white rounded-md"> Submite</button>
    </form>
</div>



@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/monthSelect/index.js"></script>
<script>
    const monthPicker = document.getElementById("monthPicker");
    const checkboxContainer = document.getElementById("checkboxContainer");

    // Nama-nama hari
    const dayNames = [
      "Minggu",
      "Senin",
      "Selasa",
      "Rabu",
      "Kamis",
      "Jumat",
      "Sabtu",
    ];

    $(document).ready(function () {
      flatpickr(monthPicker, {
        dateFormat: "F Y", // Format bulan dan tahun
        defaultDate: new Date(), // Tanggal default
        plugins: [
          new monthSelectPlugin({
            shorthand: false, // Gunakan nama bulan lengkap
            dateFormat: "F Y", // Format untuk value asli
            altFormat: "F Y", // Format untuk tampilan
          }),
        ],
        onChange: function (selectedDates, dateStr) {
          const [month, year] = dateStr.split(" ");
          const monthNumber = new Date(`${month} 1, ${year}`).getMonth() + 1;
          const yearNumber = parseInt(year);
          generateCheckboxes(monthNumber, yearNumber);
        },
      });
    });

    function generateCheckboxes(month, year) {
      checkboxContainer.innerHTML = ""; // Hapus kotak sebelumnya

      // Dapatkan jumlah hari dalam bulan
      const daysInMonth = new Date(year, month, 0).getDate();

      for (let day = 1; day <= daysInMonth; day++) {
        const date = new Date(year, month - 1, day);
        const dayName = dayNames[date.getDay()];

        // Elemen kotak kuis
        const option = document.createElement("div");
        option.className =
          "flex flex-col md:w-20 md:h-20 items-center justify-center bg-white border border-gray-300 rounded-lg p-4 text-center shadow-sm cursor-pointer hover:bg-blue-900 hover:text-white transition";

        const checkbox = document.createElement("input");
        checkbox.type = "checkbox";
        checkbox.id = `day-${day}`;
        checkbox.name = `array_date[]`;
        checkbox.value = day;
        checkbox.className = "hidden"; // Sembunyikan input checkbox

        const label = document.createElement("label");
        label.htmlFor = `day-${day}`;
        label.textContent = `${day} (${dayName})`;
        label.className = "text-sm font-medium cursor-pointer select-none";

        option.appendChild(checkbox);
        option.appendChild(label);
        checkboxContainer.appendChild(option);

        // Event listener untuk seleksi
        option.addEventListener("click", () => {
          checkbox.checked = !checkbox.checked;
          option.classList.toggle("bg-red-600", checkbox.checked);
          option.classList.toggle("text-white", checkbox.checked);
          option.classList.toggle("border-blue-700", checkbox.checked);
        });
      }
    }

    // Inisialisasi awal ke bulan dan tahun saat ini
    const currentDate = new Date();
    generateCheckboxes(currentDate.getMonth() + 1, currentDate.getFullYear());
</script>
@endpush
@endsection