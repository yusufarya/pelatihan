$(function () {
    // console.log("ready");

    $("#search").on("click", function () {
        $("#submitForm").submit();
    });

    setTimeout(() => {
        $("#message").hide(500);
        $("#success").hide(500);
    }, 4000);
});

function getDetailUser(code) {
    $("#tb-detail").html("");
    $("#modal-detail").modal("show");

    var route = "getDetailAdmin";
    $.ajax({
        type: "GET",
        dataType: "JSON",
        url: route,
        data: { code: code },
        success: (data) => {
            console.log(data);
            $("#since").text("Tanggal daftar " + data.created_at);
            $(".imgProfile").attr("src", "img/userDefault.png");

            var html =
                `
            <tr>
                <td> Nomor </td>
                <td> ` +
                data.code +
                ` </td>
            </tr>
            <tr>
                <td> Nama Lengkap</td>
                <td> ` +
                data.fullname +
                ` </td>
            </tr>
            <tr>
                <td> Jenis Kelamin </td>
                <td> ` +
                data.gender +
                ` </td>
            </tr>
            <tr>
                <td> Tempat, tanggal lahir </td>
                <td> ` +
                data.place_of_birth +
                `, ` +
                data.date_of_birth +
                ` </td>
            </tr>
            <tr>
                <td> Alamat Lengkap </td>
                <td> ` +
                data.address +
                `</td>
            </tr>
            <tr>
                <td> No Telp </td>
                <td> ` +
                data.no_telp +
                ` </td>
            </tr>
            <tr>
                <td> Email </td>
                <td> ` +
                data.email +
                ` </td>
            </tr>
            <tr>
                <td> Level </td>
                <td> ` +
                data.level +
                ` </td>
            </tr>
            `;
            $("#tb-detail").append(html);
        },
    });
}

function delete_data(number, name) {
    //
    $("#modal-delete").modal("show");
    $(".modal-title").text("Hapus Data");
    $("#modal-delete form").attr("action", "/delete-registrant/" + number);
    $("#content-delete").html("");

    var html =
        `<div class="col mb-2">
                <input type="hidden" name="number" id="number" value="` +
        number +
        `">
                <span style="margin-left: 10px;">Hapus Data <b>` +
        name +
        `</b> ?<span>
                </div>`;

    $("#content-delete").append(html);
}
