
$(document).ready(function() {
    const openFileButton = document.getElementById("openFileButton");

    async function askUserForFiles(multiple = false, timeout = 10) {
        const input = document.createElement("input");
        input.type = "file";
        input.multiple = multiple;
        input.click(); // "click" the file picker button

        return new Promise((resolve, reject) => {
            input.addEventListener("change", event => resolve(input.files));
            setTimeout(() => reject(), timeout * 1000); // After the timeout runs out, give up waiting for the user to choose
        });
    }

    openFileButton.addEventListener("click", async event => {
        try {
            const fileList = await askUserForFiles(true, 20); // Allow multiple files, and wait for 10 seconds before error.
            alert(`${fileList.length} files selected`);
        } catch (e) {
            alert("Timed out.");
        }
    });
})