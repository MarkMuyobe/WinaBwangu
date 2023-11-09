document.addEventListener('DOMContentLoaded', function () {
  const form = document.getElementById('transaction-form');
  const table = document.getElementById('table');

  form.addEventListener('submit', function (event) {
    event.preventDefault();

    const mobileBooth = document.getElementById('mobile-booth').value;
    const location = document.getElementById('location').value;
    const service = document.getElementById('service').value;
    const revenue = document.getElementById('revenue').value;
    const amount = document.getElementById('amount').value;

    // Create a new row
    const newRow = table.insertRow();
    const cell1 = newRow.insertCell(0);
    const cell2 = newRow.insertCell(1);
    const cell3 = newRow.insertCell(2);
    const cell4 = newRow.insertCell(3);
    const cell5 = newRow.insertCell(4);

    cell1.innerHTML = mobileBooth;
    cell2.innerHTML = location;
    cell3.innerHTML = service;
    cell4.innerHTML = revenue;
    cell5.innerHTML = amount;

    // Reset the form
    form.reset();
  });
});

function deleteRecord(recordId) {
  // Send an AJAX request to the PHP script
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'delete.php', true);
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

  // Define what to do when the request is complete
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // Check the response from the server
      if (xhr.responseText === 'success') {
        // Remove the row from the table
        var row = document.getElementById('row_' + recordId);
        row.parentNode.removeChild(row);
      } else {
        alert('Deletion failed.');
      }
    }
  };

  // Send the record ID as a parameter to the PHP script
  xhr.send('recordId=' + recordId);
}

function hideRow(button) {
  // Get the row containing the delete button
  var row = button.parentNode.parentNode;

  // Hide the row by setting its style.display property to "none"
  row.style.display = 'none';
}

function editRow(recordId) {
  // Hide the "Edit" button
  document
    .getElementById('row_' + recordId)
    .querySelectorAll('a.btn-primary')[0].style.display = 'none';

  // Show the "Save" and "Cancel" buttons
  document
    .getElementById('row_' + recordId)
    .querySelectorAll('a.btn-danger')[0].style.display = 'inline';
  document
    .getElementById('row_' + recordId)
    .querySelectorAll('a.btn-secondary')[0].style.display = 'inline';

  // Enable editing by showing input fields and hiding the spans
  document.getElementById('ID_' + recordId).style.display = 'none';
  document.getElementById('ID_input_' + recordId).style.display = 'inline';

  document.getElementById('TransactionID_' + recordId).style.display = 'none';
  document.getElementById('TransactionID_input_' + recordId).style.display =
    'inline';

  // Repeat this for other table cells you want to edit
}

function cancelEdit(recordId) {
  // Hide the "Save" and "Cancel" buttons
  document
    .getElementById('row_' + recordId)
    .querySelectorAll('a.btn-danger')[0].style.display = 'none';
  document
    .getElementById('row_' + recordId)
    .querySelectorAll('a.btn-secondary')[0].style.display = 'none';

  // Show the "Edit" button
  document
    .getElementById('row_' + recordId)
    .querySelectorAll('a.btn-primary')[0].style.display = 'inline';

  // Disable editing by hiding input fields and showing the spans
  document.getElementById('ID_input_' + recordId).style.display = 'none';
  document.getElementById('ID_' + recordId).style.display = 'inline';

  document.getElementById('TransactionID_input_' + recordId).style.display =
    'none';
  document.getElementById('TransactionID_' + recordId).style.display = 'inline';

  // Repeat this for other table cells you want to edit
}
