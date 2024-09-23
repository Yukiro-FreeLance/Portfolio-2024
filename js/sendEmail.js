
const form = document.getElementById('form');
const fname = document.getElementById('fname');
const email = document.getElementById('email');
const message = document.getElementById('message');

function sendEmail() {
    
    const bodyMsg = `<br>Fullname : ${fname.value}
                <br>Email    : ${email.value}
                <br>Message  : ${message.value}`;
    Email.send({
        Host: "smtp.elasticemail.com",
        Username: "wendelluche20@gmail.com",
        Password: "mjye uqvt ugyh qwji",
        To: '',
        From: '',
        Subject: "",
        Body: bodyMsg
    }).then(
        
        message => {
            if (message === "OK") {
                Swal.fire({
                    title: "Successful",
                    text: "Your message has been sent",
                    icon: "success",
                    padding: "3em",
                    color: "#100e22",
                    background: "#fff",
                    backdrop: `
                      rgba(255, 255, 255, 0.4)
                      url("https://media.tenor.com/Mn6BfF6_o2oAAAAi/cape-flying.gif")
                      right top
                      no-repeat
                    `
                  });
            }
        }
    );
}

form.addEventListener('submit', (e) => {
    e.preventDefault();
    sendEmail();
});