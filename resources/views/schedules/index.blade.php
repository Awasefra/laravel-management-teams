@extends('layouts.main')

@section('content')
<h1 class="flex justify-between border-b mb-4 font-medium text-xl">
    Schedule

</h1>

<a href="{{ route('schedules.show-create') }}"
    class="mb-2 text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
    Create
</a>

<div class="mt-8">
    <label for="personnel_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an
        option</label>
    <select id="personnel_id" name="personnel_id" onchange="getJadwal(this.value)"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
        <option value="">-- Select Name --</option>
        @foreach ($personnels as $personnel)

        <option value="{{ $personnel->id }}">{{ $personnel->name }}</option>
        @endforeach

    </select>

</div>

<div id="checkboxContainer" class="w-full mt-8 md:w-[50%] grid grid-cols-5 md:grid-cols-7 gap-4"></div>

@include('components.toast-alert')
@push('scripts')
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

    function getJadwal(personnelId) {
        checkboxContainer.innerHTML= "";
        console.log(personnelId);
        $.get(`/schedules/jadwal/${personnelId}`, function (datas) {
            console.log(datas.data);
            generateCheckboxes(datas.data.array_date_in, 12, 2024);
        }).fail(function (error) {
            console.log("Ajax request error:", error);
        });
    }

    function generateCheckboxes(data, month, year) {
        console.log(data);
        
        checkboxContainer.innerHTML = ""; // Hapus kotak sebelumnya

        // Dapatkan jumlah hari dalam bulan
        const daysInMonth = new Date(year, month, 0).getDate();

        for (let day = 1; day <= daysInMonth; day++) {
            const date = new Date(year, month - 1, day);
            const dayName = dayNames[date.getDay()];

            // Elemen kotak checkbox
            const option = document.createElement("div");
            option.className =
                "flex flex-col md:w-20 md:h-20 items-center justify-center bg-white border border-gray-300 rounded-lg p-4 text-center shadow-sm transition";

            const checkbox = document.createElement("input");
            checkbox.type = "checkbox";
            checkbox.id = `day-${day}`;
            checkbox.name = `array_date[]`;
            checkbox.value = day;
            checkbox.className = "hidden"; // Sembunyikan input checkbox

            const label = document.createElement("label");
            label.htmlFor = `day-${day}`;
            label.textContent = `${day} (${dayName})`;
            label.className = "text-sm font-medium select-none";

            option.appendChild(checkbox);
            option.appendChild(label);
            checkboxContainer.appendChild(option);

            // Event listener untuk seleksi checkbox
            // Menandai checkbox yang sesuai dengan data yang diterima
            if (data.includes(day.toString())) {  // Cek jika day ada di dalam data
                checkbox.checked = true;
                option.classList.add("bg-blue-500", "text-white", "border-blue-700");
            }
        }
    }
</script>

@endpush
@endsection