var selectedBooth = document.getElementById('locationDropdown');
var serviceName = document.getElementById('serviceDropdown');
var details = document.getElementById('details');
var boothName = document.getElementById('locationDropdown');
var dBooth = document.getElementById('dBooth');
var dLocation = document.getElementById('dLocation');
var serviceDiv = document.getElementById('serviceDiv'); //The one you want to show
var placeholderDiv = document.getElementById('placeholder'); //The one you want to hide
var detailsDiv = document.getElementById('details');
var aatText = document.getElementById('totalResult');
var amountElement = document.querySelector('.input');
var dAmount = document.getElementById('dAmount');

var oldService = document.getElementById('service1');

// Add an event listener to the amount element
amountElement.addEventListener('input', function () {
  var dRPK = document.getElementById('dRPK').textContent;
  var revenuePerKwanch = parseFloat(dRPK);
  var tax = 0.15;
  var amount = parseFloat(amountElement.value);

  console.log('dAmount', amountElement.value);

  dAmount.textContent = amountElement.value;

  //calculate tax
  amount = amount - amount * tax;
  //remove Revenue After tax
  revenueAfterTax = amount * revenuePerKwanch;

  //calculate AAT
  amount = amount - revenueAfterTax;

  var rounded = amount.toFixed(2);

  //show result as Amount after tax
  aatText.textContent = `K${rounded}`;
  fadeInNum(aatText);
});

function populateServiceDropdown() {
  // Get the selected BoothName from the first dropdown
  var selectedBooth = document.getElementById('locationDropdown').value;
  var serviceName = document.getElementById('serviceDropdown');

  // Clear existing options in the second dropdown
  serviceName.innerHTML = '';

  // Define a JavaScript object to map BoothName to ServiceName options
  var serviceOptions = {
    Wina1: ['', 'Airtel Money', 'MTN Money', 'Zamtel Money', 'Zanaco', 'FNB'],
    Wina2: ['', 'Airtel Money', 'MTN Money', 'Zamtel Money', 'FNB'],
    Wina3: ['', 'Airtel Money', 'MTN Money', 'Zamtel Money', 'Zanaco', 'FNB'],
    Wina4: ['', 'Airtel Money', 'MTN Money', 'Zamtel Money'],
    Wina5: ['', 'Airtel Money', 'MTN Money', 'Zanaco', 'FNB'],
    Wina6: ['', 'Airtel Money', 'MTN Money', 'Zamtel Money'],
  };

  //show details if dropdow has real values in it
  if (boothName.value != 'none') {
    // Populate the second dropdown based on the selected BoothName
    var serviceOptionsForBooth = serviceOptions[selectedBooth];
    if (serviceOptionsForBooth) {
      for (var i = 0; i < serviceOptionsForBooth.length; i++) {
        var option = document.createElement('option');
        option.text = serviceOptionsForBooth[i];
        serviceName.appendChild(option);
      }
    }

    showDetails();
  } else {
    fadeOutDiv2(detailsDiv);
  }
}

function showDetails() {
  // TODO: Remove the && below if its useless
  if (boothName.value != '') {
    // Show the details div with a fade-in effect
    detailsDiv.style.display = 'block';
    detailsDiv.style.opacity = 0;

    dBooth.textContent = boothName.value;

    ////////////////////////////////////////////////////////////
    //Show the correct Location based on the selected booth
    var boothLocations = {
      Wina1: 'Lusaka CPD',
      Wina2: 'Libala',
      Wina3: 'Kabwata',
      Wina4: 'Mandevu',
      Wina5: 'Woodlands',
      Wina6: 'Matero East',
    };

    // Check if the boothName is in the mapping
    if (boothLocations.hasOwnProperty(boothName.value)) {
      // Update the text content of the <p> element with the corresponding location
      dLocation.textContent = 'Location: ' + boothLocations[boothName.value];
    } else {
      // If boothName is not found in the mapping, you can provide a default message or handle it as needed
      dLocation.textContent = 'Location not found';
    }
    ////////////////////////////////////////////////////////////

    //Animate appearance of the detailsDiv
    var fadeInInterval = setInterval(function () {
      if (detailsDiv.style.opacity < 1) {
        detailsDiv.style.opacity = parseFloat(detailsDiv.style.opacity) + 0.1;
      } else {
        clearInterval(fadeInInterval);
      }
    }, 100);
  } else {
    // Hide the details div for other options
    fadeOutDiv(detailsDiv);
  }
}

function smoothTransition(entering, exiting) {
  fadeOutDiv(exiting, function () {
    fadeInDivWithHeight(entering); // Call the second function as a callback
  });
}

function showServiceDetails() {
  console.log('Service', serviceName.value);

  var serviceValues = {
    'Airtel Money': 1,
    'MTN Money': 2,
    'Zamtel Money': 3,
    Zanaco: 4,
    FNB: 5,
  };

  //Show service details
  //variable for new service
  newService = document.getElementById(
    'service' + serviceValues[serviceName.value]
  );
  console.log('serviceNo', newService);
  if (newService != oldService) {
    console.log('new', newService);
    console.log('old', oldService);
    smoothTransition(newService, oldService);
    oldService = newService;
  }

  if (boothName.value != 'none') {
    if (serviceName.value != '') {
      //hide place holder and show service Div
      smoothTransition(serviceDiv, placeholderDiv);
    } else {
      smoothTransition(placeholderDiv, serviceDiv);
    }
  } else {
    fadeOutDiv(detailsDiv);
  }
}

function fadeOutDiv2(divElement) {
  // Set the initial opacity to 1 (fully visible)
  var opacity = 1;

  // Create an interval that decreases opacity gradually
  var fadeInterval = setInterval(function () {
    if (opacity > 0) {
      // Reduce opacity by a small amount (adjust the step as needed)
      opacity -= 0.05; // You can change this step value to control the speed of the fade
      divElement.style.opacity = opacity;
    } else {
      // Once opacity reaches 0, hide the div and clear the interval
      divElement.style.display = 'none';
      clearInterval(fadeInterval);
    }
  }, 50); // You can adjust the interval duration (in milliseconds) for smoother or faster fades
}

function fadeOutDiv(divElement, callback) {
  // Set the initial opacity to 1 (fully visible)
  var opacity = 1;

  // Create an interval that decreases opacity gradually
  var fadeInterval = setInterval(function () {
    if (opacity > 0) {
      // Reduce opacity by a small amount (adjust the step as needed)
      opacity -= 0.05; // You can change this step value to control the speed of the fade
      divElement.style.opacity = opacity;
    } else {
      // Once opacity reaches 0, hide the div and clear the interval
      divElement.style.display = 'none';
      clearInterval(fadeInterval);

      // Call the callback function to start the next animation
      if (typeof callback === 'function') {
        callback();
      }
    }
  }, 50); // You can adjust the interval duration (in milliseconds) for smoother or faster fades
}

function fadeInDiv(divElement) {
  // Set the initial opacity to 0 (fully transparent)
  var opacity = 0;

  // Show the div before fading in
  divElement.style.display = 'block';

  // Create an interval that increases opacity gradually
  var fadeInterval = setInterval(function () {
    if (opacity < 1) {
      // Increase opacity by a small amount (adjust the step as needed)
      opacity += 0.05; // You can change this step value to control the speed of the fade
      divElement.style.opacity = opacity;
    } else {
      // Once opacity reaches 1 (fully visible), clear the interval
      clearInterval(fadeInterval);
    }
  }, 50); // You can adjust the interval duration (in milliseconds) for smoother or faster fades
}

function fadeInNum(divElement) {
  // Set the initial opacity to 0 (fully transparent)
  var opacity = 0;

  //Hide the item before the new one shows
  divElement.style.display = 'none';
  // Wait for 1 second before starting the fade
  setTimeout(function () {
    divElement.style.opacity = 0;
    // Show the div before fading in
    divElement.style.display = 'block';
    divElement.style.opacity = 0;
    // Create an interval that increases opacity gradually
    var fadeInterval = setInterval(function () {
      if (opacity < 1) {
        // Increase opacity by a small amount (adjust the step as needed)
        opacity += 0.1; // You can change this step value to control the speed of the fade
        divElement.style.opacity = opacity;
      } else {
        // Once opacity reaches 1 (fully visible), clear the interval
        clearInterval(fadeInterval);
      }
    }, 100); // 100 milliseconds interval for smooth fading
  }, 1200); // Wait for 1 second (1000 milliseconds) before starting the fade
}

function fadeInDivWithHeight(divElement) {
  // Set the initial opacity to 0 (fully transparent) and height to 0
  var opacity = 0;
  var height = 80;

  // Show the div before fading in
  divElement.style.display = 'block';

  // Create an interval that increases opacity and height gradually
  var fadeInterval = setInterval(function () {
    if (opacity < 1) {
      // Increase opacity by a small amount (adjust the step as needed)
      opacity += 0.05; // You can change this step value to control the speed of the fade
      divElement.style.opacity = opacity;
    }
    if (height < 100) {
      // Increase height by a small amount (adjust the step as needed)
      height += 1; // You can change this step value to control the speed of the height increase
      divElement.style.height = height + 'px';
    } else {
      // Once opacity reaches 1 and height reaches your desired value, clear the interval
      clearInterval(fadeInterval);
    }
  }, 50); // You can adjust the interval duration (in milliseconds) for smoother or faster fades
}

// function updateAAT() {
//   console.log('new value: ', amountElement.value);
//   // TODO: get revenue per Kwanch
//   revenuePerKwanch = 0;
//   tax = 0.15;
//   amount = parseFloat(amountElement.value);
//   console.log('Amount', amount);
//   //get value of input

//   //calculate tax
//   amount = amount - amount * tax;
//   //remove Revenue After tax
//   revenueAfterTax = amount * revenuePerKwanch;

//   //calculate AAT
//   amount = amount - revenueAfterTax;
//   amount = 255;

//   //show result as Amount after tax
//   aatText.textContent = `K${amount}`;
// }

function createEntry() {}
