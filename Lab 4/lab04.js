// Problem 1
function validateForm() {
    const nameInput = document.getElementById('name');
    const phoneInput = document.getElementById('phone');
    const name = nameInput.value;
    const phone = phoneInput.value;

    const namePattern = /^[A-Za-z\s]+$/;
    const phonePattern = /^\(\d{3}\)\s\d{3}-\d{4}$/;

    if (namePattern.test(name) && phonePattern.test(phone)) {
        const formattedPhone = `${phone.slice(1, 4)}-${phone.slice(6, 9)}-${phone.slice(10)}`;
        const output = document.getElementById('output');
        output.innerHTML = `<p>Name: ${name}</p><p>Address: ${document.getElementById('address').value}</p><p>Phone Number: ${formattedPhone}</p>`;
    } else {
        alert('Invalid input. Name should contain only letters, and phone number should be in the format (123) 456-7890');
    }
}

// Problem 2
function countCharacters() {
    const textarea = document.getElementById('textarea');
    const charCount = document.getElementById('charCount');
    const letterCount = document.getElementById('letterCount');
    const text = textarea.value;
    const charLength = text.length;
    charCount.textContent = `Character Count: ${charLength}`;

    // Count letters (A-Z and a-z)
    const letterPattern = /[A-Za-z]/g;
    const letterMatches = text.match(letterPattern);
    const letterLength = letterMatches ? letterMatches.length : 0;
    letterCount.textContent = `Letter Count: ${letterLength}`;
}

// Problem 3
const bookmarksList = document.getElementById('bookmarksList');
function createBookmark(url) {

    const li = document.createElement('li');
    const bookmarkItem = document.createElement('div');
    const icon = document.createElement('img');
    icon.width = 15;
    icon.height = 15;

    secureURLPattern = /^https:\/\/.+/;
    insecureURLPattern = /^http:\/\/.+/;
    if (secureURLPattern.test(url)) {
        icon.src = 'https://img.icons8.com/fluency-systems-filled/96/12B886/lock-screen.png';
    } else if (insecureURLPattern.test(url)) {
        icon.src = 'https://img.icons8.com/fluency-systems-filled/96/FA5252/unlock.png';
    } else {
        alert('Invalid input. URL should begin with http:// or https://');
        return;
    }

    const link = document.createElement('a');
    link.href = url;
    link.textContent = url;

    bookmarkItem.appendChild(icon);
    bookmarkItem.appendChild(link);

    li.appendChild(bookmarkItem);
    bookmarksList.appendChild(li);
}

createBookmark('https://www.secure.com');
createBookmark('http://www.insecure.com');
