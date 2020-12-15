var local = localStorage.getItem("local");
local = JSON.parse(local);
if (local === null) {
    local = [];
}

function Index() {
    var index = "";
    for (var i in local) {
        var data = JSON.parse(local[i]);
        index += "<tr>";
        index += "<td>" + data.Name + "</td>";
        index += "<td>" + data.Number1 + "</td>";
        index += "<td>" + data.Number2 + "</td>";
        index += "<td>" + data.Average + "</td>";
        index += "<td>" + data.GetHeal + "</td>";
        index += "<td><button alt='Deleted" + i + "' class='btn btn-danger mr-2 btnDelete' onclick='btnDelete(" + i + ")' id='btnDelete'>Delete</button></td>";
        index += "</tr>";
    }
    document.getElementById("database").innerHTML = index;
}
Index();

function KetQua(a) {
    if (a >= 5) {
        return "Lên lớp";
    } else {
        return "Lưu ban";
    }
}

function Created() {
    var check = -1;
    var checkuser = -1;
    if (document.getElementById("Name").value == "" || document.getElementById("Number1").value == "" || document.getElementById("Number2").value == "") {
        alert("Nhập không đủ dữ kiện, vui lòng nhập lại!");
    } else {
        if (((document.getElementById("Number1").value > 10) || (document.getElementById("Number1").value < 0)) || ((document.getElementById("Number2").value > 10) || (document.getElementById("Number2").value < 0))) {
            check++;
        }
        for (var j in local) {
            var datacheck = JSON.parse(local[j]);
            if (document.getElementById("Name").value == datacheck.Name) {
                checkuser++;
            }
        }
        if (check != -1) {
            alert("Điểm chỉ có thể nằm trong vùng từ 0 đến 10!");
        } else {
            if (checkuser != -1) {
                alert("Người này đã tồn tại, vui lòng xóa dữ liệu cũ trước khi thay đổi dữ liệu mới!");
            } else {
                var t = (document.getElementById("Number1").value * 1 + document.getElementById("Number2").value * 2) / 3;
                var Database = JSON.stringify({
                    Name: document.getElementById("Name").value,
                    Number1: document.getElementById("Number1").value * 1,
                    Number2: document.getElementById("Number2").value * 1,
                    Average: Math.round(t * 100) / 100,
                    GetHeal: KetQua(Math.round(t * 100) / 100)
                });
                local.push(Database);
                localStorage.setItem("local", JSON.stringify(local));
                alert("Nhập thành công cho sinh viên : " + document.getElementById("Name").value);
                Index();
            }
        }
    }
    location.reload();
}

function btnDelete(id) {

    var dataget = JSON.parse(local[id])
    alert("Xóa thành công người dùng : " + dataget.Name);

    local.splice(id, 1);
    localStorage.setItem("local", JSON.stringify(local));

    Index();
}