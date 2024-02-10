$(function () {
    $("#participant_number").on("change", function () {
        $.ajax({
            type: "GET",
            dataType: "JSON",
            url: "/getDetailParticipant",
            data: { number: $(this).val() },
            success: (response) => {
                if (response.status == "success") {
                    var data = response.data;
                    // console.log(data);
                    $("#nik").val(data.nik);
                    $("#no_telp").val(data.no_telp);
                    $("#sub_district").val(data.sub_districts.name);
                    $("#training").val(response.training_name);
                } else if (response.status == "warning") {
                    alert(response.message);
                } else {
                    alert("Data tidak ditemukan, hubungi administrator.");
                }
            },
        });
    });
});
