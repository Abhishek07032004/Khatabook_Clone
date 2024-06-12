function showmodal() {
    document.querySelector('.overlay').classList.add('showoverlay');
    document.querySelector('.loginform').classList.add('showloginform');
}
function back(){
    window.location.href="frontpage.php";
}

function del(cid, bid) {
    const xobj = new XMLHttpRequest();
    xobj.onreadystatechange = function() {
        if (xobj.readyState === 4 && xobj.status === 200) {
        
            checkajax(bid);
            alert("customer deleted sucessfully");


        }
    };
    xobj.open("GET", "deltemp.php?id=" + cid, true);
    xobj.send();
}

function checkajax(bid) {
    const xobj = new XMLHttpRequest();
    xobj.onreadystatechange = function() {
        if (xobj.readyState === 4 && xobj.status === 200) {
            try {
                const dt = JSON.parse(xobj.responseText);
                document.getElementById("get").innerHTML = dt.totalTake;
                document.getElementById("give").innerHTML = dt.totalGive;
                
                let str = `
                    <div class='container'>
                        <table border='0' style='padding: 5px; width: 100%'>
                            <tr style='background-color: #f0f0f0;'>
                                <th style='width: 20%'>Name</th>
                                <th style='width: 20%'>Given</th>
                                <th style='width: 20%'>Taken</th>
                                <th style='width: 20%'>Delete</th>
                            </tr>
                `;
                
                for (let i = 0; i < dt.totalRecord.length; i++) {
                    const record = dt.totalRecord[i];
                    str += `
                        <tr>
                            <td style='font-weight: bold; text-align: center'>
                                <a href='History.php?id=${record.customer_id}'>${record.name}</a>
                            </td>
                            <td style='color: red; font-weight: bold; text-align: center'>
                                ${record.given}.00 /-
                            </td>
                            <td style='color: green; font-weight: bold; text-align: center'>
                                ${record.taken}.00 /-
                            </td>
                            <td style='color: red; font-weight: bold; text-align: center; cursor: pointer'>
                                <i class='fa-solid fa-trash' onclick='del(${record.customer_id}, ${bid})'></i>
                            </td>
                        </tr>
                    `;
                }
                
                str += `
                        </table>
                        <div class='addcustomer'>
                            <a href='addcustomers.php?bid=${bid}'>+Addcustomer</a>
                        </div>
                    </div>
                `;
                
                document.getElementById("display_here").innerHTML = str;
            } catch (error) {
                console.error("Error parsing JSON:", error);
            }
        }
    };
    xobj.open("GET", 'fetchcustomers.php?bid=' + bid, true);
    xobj.send();
}
