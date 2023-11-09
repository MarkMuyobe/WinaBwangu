
/** Validating Inputs**/
   
function getPage(){
    window.location.href ='login.html';
}

function validateFname(){
    const fname = document.getElementById('fname');
    const fnameValue = fname.value.trim();
    const lname = document.getElementById('lname');
    
    if(fnameValue === ""){
        alert("Please enter your first name");   
        lname.disabled = true;
    }
    else{
        
        lname.disabled = false;
        
        
    }

}
  
function validateLname(){ 
    const lname = document.getElementById('lname');
    const lnameValue = lname.value.trim();
    const nrc = document.getElementById('nrc');
    
    if(lnameValue === ""){
        alert("enter your last name");
        nrc.disabled = true;
    }
    else{
        nrc.disabled = false;
        
    }
   
}

function validateNrc(){
    const nrc = document.getElementById('nrc');
    const nrcValue = nrc.value.trim();
    const dob = document.getElementById('dob');
    
    if(nrcValue === ""){
        alert("enter your NRC number");
        dob.disabled = true;
        
    }
    else if(!isValidNRC(nrcValue)){
        alert("enter a valid NRC number in the format xxxxxx/xx/x")
    }
    else{
        dob.disabled = false;
        
       
    }
   
}




function isValidNRC(nrc) {
    // Use your NRC validation logic here
    var nrcPattern = /^\d{6}\/\d{2}\/\d{1}$/;
    return nrcPattern.test(nrc);
  }

function validateDob(){
    const dobValue = dob.value.trim();
    const phoneNo = document.getElementById('phoneNo');
    if(dobValue === ""){
        alert("enter your date of birth");
        gender.disabled = true;
    }
    else{
        phoneNo.disabled = false;
        
    }
   
}

function validatePhoneNo() {
    const phoneNo = document.getElementById('phoneNo');
    const email = document.getElementById('email');
    const phoneNoValue = phoneNo.value.trim();

    if (phoneNoValue === "") {
        alert("Enter a correct phone number");
        email.disabled = true;
    }else if (!isPhoneNumber(phoneNoValue)) {
        if(phoneNoValue.charAt(0) != "+"){
            alert("Please add a + at the beginning of your number");
            email.disabled = true;
        }
    }
     else if (!isPhoneNumber(phoneNoValue)) {
        alert("Please enter a valid phone number");
        email.disabled = true;
    }
     else {
        email.disabled = false;
        
    }
}



function isPhoneNumber(phoneNo) {
    // Use your phone number validation logic here
    //var phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
    var phoneno = /^\+(?:([0-9]{2}))?[-. ]?([0-9]{3})[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
    return phoneNo.match(phoneno);
}


const isValidEmail = email => {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(String(email).toLowerCase());
}

function validateEmail(){
    const email = document.getElementById('email'); // Correctly select the email element
    const emailValue = email.value.trim();
    const client = document.getElementById('client');
    
    if(emailValue === ""){
        alert("Enter your email address");
        client.disabled = true;
    } else if(!isValidEmail(emailValue)){
        alert("Provide a valid email address");
    } else {
        client.disabled = false;
        
    }
}

function validateClient(){  
    const client = document.getElementById('client');  
    const clientValue = client.value.trim();
    const hobbies = document.getElementById('hobbies');
    if(clientValue === ""){
        alert("enter what type of client you are");
        hobbies.disabled = true;
    }
    else{
        hobbies.disabled = false;
        
    }

   
}
function  validateHobbies(){ 
    const hobbies = document.getElementById('hobbies');   
    const hobbieValue = hobbies.value.trim();
    const houseNo = document.getElementById('houseNo');
    if(hobbieValue === ""){
        alert("Please list down your hobbies");
        houseNo.disabled = true;
    }
    else{
        houseNo.disabled = false;
        
        
    }
   
}
function validateHouseNo(){   
    const houseNo = document.getElementById('houseNo'); 
    const houseNoValue = houseNo.value.trim();
    const street = document.getElementById('street');
    if(houseNoValue === ""){
        alert("enter your house number");
        street.disabled = true;
    }
    else{
        street.disabled = false;
        
    }
}
function validateStreet(){    
    const street = document.getElementById('street');
    const streetValue = street.value.trim();
    const area = document.getElementById('area');
    if(streetValue === ""){
        alert("enter your street name");
        area.disabled = true;
    }
    else{
        area.disabled = false;
        
    }
    
   
}
function validateArea(){  
    const area = document.getElementById('area'); 
    const areaValue =area.value.trim();
    const town = document.getElementById('town');
    if(areaValue === ""){
        alert("enter your area name");
        town.disabled = true;
    }
    else{
        town.disabled = false;
        
    }
   
}



function validateTown(){   
    const town = document.getElementById('town'); 
    const townValue =town.value.trim();
    const province = document.getElementById('province');
    if(townValue === ""){
        alert("enter your town");
        province.disabled = true;
    }
    else{
        province.disabled = false;
        
    }
   
}
function validateProvince(){    
    const province = document.getElementById('province');
    const provinceValue = province.value.trim();
    const country = document.getElementById('country');
    if(provinceValue === ""){
        alert("enter your province name");
        country.disabled = true;
    }
    else{
        country.disabled = false;
        
    }
   
}
function validateCountry(){  
    const country = document.getElementById('country');  
    const countryValue = country.value.trim();
    const username = document.getElementById('username');
    if(countryValue === ""){
        alert("enter your country");
        username.disabled = true;
    }
    else{
        username.disabled = false;
        
    }
   
 



}
function validateUser(){ 
    const username = document.getElementById('username');   
    const usernameValue = username.value.trim();
    const password = document.getElementById('password');
    const password1 = document.getElementById('password1');
    if(usernameValue === ""){
        alert("enter your username");
        password.disabled = true;
        password1.disabled = true;
    }
    else{
        password.disabled = false;
        
        
    }
   
}
function validatePass(){ 
    const password = document.getElementById('password');   
    const passwordValue =password.value.trim();
    const password1 = document.getElementById('password1');
    
    if(passwordValue === ""){
        alert("enter your password");
        password1.disabled = true;
    }
    else if(passwordValue.length < 6){
        alert("password must be atleast 6 characters long");
        password1.disabled = true;
    }
    else{
        password1.disabled = false;
        
    }
   
}
function validatePass1(){    
    const password = document.getElementById('password');   
    const passwordValue = password.value.trim();
    const password1 = document.getElementById("password1");
    const password1Value = password1.value.trim();
    const name = document.getElementById('name');

    if (password1Value === "") {
        alert("Please confirm your password");
        name.disabled = true;
    }
    else if (password1Value === passwordValue) {
        name.disabled = false;
    } 
    else {
        alert("Passwords do not match");
        name.disabled = true;
    }
    
   
}

function validateName(){
    const name = document.getElementById('name');
    const nameValue = name.value.trim();
    const accNo = document.getElementById('accNo');
    if(nameValue === ""){
        alert("Enter bank name");
        accNo.disabled = true;
    }
    else{
        accNo.disabled = false;
    }
}

function validateAccNo(){
    const accNo = document.getElementById('accNo');
    const accNoValue = accNo.value.trim();
    const branch = document.getElementById('branch');
    if(accNoValue === ""){
        alert("Enter bank account number");
        branch.disabled = true;
    }
    else if(isNaN(accNoValue)){
        alert("Enter a valid account number");
        branch.disabled = true;
    }
    else if (accNoValue.length !== 13){
        alert("account number is incomplete");
        branch.disabled = true;
    }
    else{
        branch.disabled = false;
    }

}

function validateBranch(){
    const branch = document.getElementById('branch');
    const branchValue = branch.value.trim();
    const address = document.getElementById('address');
    if(branchValue === ""){
        alert("Enter branch details");
        address.disabled = true;
    }
    else{
        address.disabled = false;
    }
}


function validateAddress(){
    const address = document.getElementById('address');
    const addressValue = address.value.trim();
    const bankPhoneNo = document.getElementById('bankPhoneNo')
    if(addressValue === ""){
        alert("Enter address details");
        bankPhoneNo.disabled = true;
    }
    else{
        bankPhoneNo.disabled = false;
    }
}

function validateBankPhoneNo(){
    const bankPhoneNo = document.getElementById('bankPhoneNo');
    const bankPhoneNoValue = bankPhoneNo.value.trim();
    const bankEmail = document.getElementById('bankEmail');
    
    if (bankPhoneNoValue === "") {
        alert("Enter a correct phone number");
        bankEmail.disabled = true;
    }else if (!isPhoneNumber(bankPhoneNoValue)) {
        if(bankPhoneNoValue.charAt(0) != "+"){
            alert("Please add a + at the beginning of your number");
            bankEmail.disabled = true;
        }
    }
     else if (!isPhoneNumber(bankPhoneNoValue)) {
        alert("Please enter a valid phone number");
        bankEmail.disabled = true;
    }
     else {
        bankEmail.disabled = false;        
    }
}

function validatebankEmail(){
    const bankEmail = document.getElementById('bankEmail');// Correctly select the email element
    const bankEmailValue = bankEmail.value.trim();
    const loginBtn = document.getElementById('loginBtn');
    
    if(bankEmailValue === ""){
        alert("Enter your email address");
        loginBtn.disabled = true;
    } else if(!isValidEmail(bankEmailValue)){
        alert("Provide a valid email address");
        loginBtn.disabled = true;
    } else {
        loginBtn.disabled = false;
        
    }
}


function submitFields(){
    // Add an event listener to the submit button
    document.getElementById('loginBtn').addEventListener('click', function (event) {
    event.preventDefault(); // Prevent the form from submitting by default
    
    // Call your validation functions
    if (validateFname() && validateLname() && validateNrc() && validateDob() && validatePhoneNo() && validateEmail() && validateClient() && 
        validateHobbies() && validateHouseNo() && validateStreet() && validateArea() && validateTown() && validateProvince() && validateCountry() && 
        validateUser() && validatePass() && validatePass1() && validateName() && validateAccNo() && validateBranch() && validateAddress()
        && validateBankPhoneNo() && validateBankEmail()) {
        loginBtn.disabled = false;    
        // If all validations pass, you can submit the form or perform any other action
        document.getElementById('form').submit();
    }
});
}

function submitFields2(){
    const fname = document.getElementById('fname');
    const lname = document.getElementById('lname');
    const nrc = document.getElementById('nrc');
    const dob = document.getElementById('dob');
    const phoneNo = document.getElementById('phoneNo');
    const email = document.getElementById('email');

     // Create a data object to send to the server
     const data = {
        username: usernameValue,
        password: passwordValue
    };

    // Send the data to the server using a POST request
    fetch('log.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
    .then(response => {
        if (response.ok) {
            // Handle success
            console.log('Data sent successfully');
            // You can redirect or perform other actions here
        } else {
            // Handle errors
            console.error('Error sending data');
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });

}




