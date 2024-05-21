var xHRObject = false;
if (window.XMLHttpRequest) {
    xHRObject = new XMLHttpRequest();
} else if (window.ActiveXObject) {
    xHRObject = new ActiveXObject("Microsoft.XMLHTTP");
}

function initializePage() {
    loadBooks();
}

function loadBooks() {
    xHRObject.open("GET", "books.json", true);
    xHRObject.onreadystatechange = function() {
        if (xHRObject.readyState === 4 && xHRObject.status === 200) {
            var books = JSON.parse(xHRObject.responseText);
            displayBooks(books);
        }
    };
    xHRObject.send(null);
}

function displayBooks(books) {
    var table = document.getElementById('book-table');
    var row = document.createElement('tr');
    books.forEach(function(book) {
        var cell = document.createElement('td');
        cell.style.textAlign = "center";

        var img = document.createElement('img');
        img.src = "begaspnet.jpg";
        img.alt = "Book Cover";
        cell.appendChild(img);
        cell.appendChild(document.createElement('br'));

        var title = document.createElement('b');
        title.textContent = "Book: ";
        cell.appendChild(title);
        var span = document.createElement('span');
        span.id = `book-${book.isbn}`;
        span.textContent = book.title;
        cell.appendChild(span);
        cell.appendChild(document.createElement('br'));

        var authors = document.createElement('b');
        authors.textContent = "Authors: ";
        cell.appendChild(authors);
        span = document.createElement('span');
        span.id = `authors-${book.isbn}`;
        span.textContent = book.authors;
        cell.appendChild(span);
        cell.appendChild(document.createElement('br'));

        var isbn = document.createElement('b');
        isbn.textContent = "ISBN: ";
        cell.appendChild(isbn);
        span = document.createElement('span');
        span.id = `isbn-${book.isbn}`;
        span.textContent = book.isbn;
        cell.appendChild(span);
        cell.appendChild(document.createElement('br'));

        var price = document.createElement('b');
        price.textContent = "Price: ";
        cell.appendChild(price);
        span = document.createElement('span');
        span.id = `price-${book.isbn}`;
        span.textContent = `$${book.price}`;
        cell.appendChild(span);
        cell.appendChild(document.createElement('br'));

        var link = document.createElement('a');
        link.href = "#";
        link.onclick = function() {
            AddRemoveItem('Add', book.isbn);
        };
        link.textContent = "Add to Shopping Cart";
        cell.appendChild(link);

        row.appendChild(cell);
    });
    table.appendChild(row);
}

function getData() {
    if (xHRObject.readyState === 4 && xHRObject.status === 200) {
        var cartContainer = document.getElementById("cart-container");
        var cartBody = document.getElementById("cart-body");
        var totalPriceElement = document.getElementById("total-price");

        var serverResponse;
        if (xHRObject.responseText !== "")
            serverResponse = JSON.parse(xHRObject.responseText);
        else serverResponse = null;

        if (serverResponse != null) {
            console.log(serverResponse);
            var keys = Object.keys(serverResponse);
            cartBody.innerHTML = "";
            var total = 0;

            for (const key of keys) {
                const title = document.getElementById(`book-${key}`).innerHTML;
                const authors = document.getElementById(`authors-${key}`).innerHTML;
                const priceString = document.getElementById(`price-${key}`).innerHTML.split('$')[1];
                const quantity = serverResponse[key];

                const price = (Number(priceString) * quantity).toFixed(2);
                total += Number(price);

                var row = document.createElement('tr');

                var isbnCell = document.createElement('td');
                isbnCell.textContent = key;
                row.appendChild(isbnCell);

                var titleCell = document.createElement('td');
                titleCell.textContent = title;
                row.appendChild(titleCell);

                var authorsCell = document.createElement('td');
                authorsCell.textContent = authors;
                row.appendChild(authorsCell);

                var priceCell = document.createElement('td');
                priceCell.textContent = `$${priceString}`;
                row.appendChild(priceCell);

                var quantityCell = document.createElement('td');
                quantityCell.textContent = quantity;
                row.appendChild(quantityCell);

                var totalCell = document.createElement('td');
                totalCell.textContent = `$${price}`;
                row.appendChild(totalCell);

                var actionCell = document.createElement('td');

                var buttonContainer = document.createElement('div');
                buttonContainer.style.display = 'flex';
                buttonContainer.style.gap = '5px'; // Add space between buttons

                // Select Button
                var selectButton = document.createElement('button');
                selectButton.textContent = "Select";
                (function(currentRow) {
                    selectButton.onclick = function() {
                        selectRow(currentRow);
                    };
                })(row);  // Create a closure to capture the current row
                buttonContainer.appendChild(selectButton);

                // Remove Button
                var removeButton = document.createElement('button');
                removeButton.textContent = "Remove";
                (function(currentRow, currentKey) {
                    removeButton.onclick = function() {
                        if (currentRow.classList.contains("selected")) {
                            AddRemoveItem('Remove', currentKey);
                        }
                    };
                })(row, key);
                buttonContainer.appendChild(removeButton);

                actionCell.appendChild(buttonContainer);
                row.appendChild(actionCell);

                cartBody.appendChild(row);
            }

            totalPriceElement.textContent = `$${total.toFixed(2)}`;
            cartContainer.style.display = "block";
        } else {
            cartBody.innerHTML = "";
            totalPriceElement.textContent = "";
            cartContainer.style.display = "none";
        }
    }
}

function AddRemoveItem(action, isbn) {
    var book = document.getElementById(`book-${isbn}`).innerHTML;

    xHRObject.open(
        "GET",
        "test.php?action=" +
        action +
        "&book=" +
        encodeURIComponent(book) +
        "&isbn=" +
        encodeURIComponent(isbn) +
        "&value=" +
        Number(new Date()),
        true
    );

    xHRObject.onreadystatechange = getData;
    xHRObject.send(null);
}

// Select Row Function 
function selectRow(row) {
    if (row.style.backgroundColor === "yellow" || row.classList.contains("selected")) {
        row.style.backgroundColor = "";
        row.classList.remove("selected");
    } else {
        row.style.backgroundColor = "yellow";
        row.classList.add("selected");
    }
}

document.addEventListener('DOMContentLoaded', initializePage);