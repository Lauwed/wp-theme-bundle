export default class FileInput {
    /**
     * 
     * @param {NodeList} inputs All the file inputs on the page
     */
    constructor(inputs) {
        this.inputs = inputs;
        this.fileList = [];
    }

    init() {
        // Add event listeners on the file input HTML element
        this.inputs.forEach(input => {
            this.setChangeEvent(input);

            // adding handlers to all the events to prevent default behaviors and 
            // stop the events from bubbling up any higher than necessary
            ;['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                input.addEventListener(eventName, this.preventDefaults, false);
            });

            // indicator to let the user know that they have indeed dragged 
            // the item over the correct area by using CSS to change the color of the border color of the drop area
            ;['dragenter', 'dragover'].forEach(eventName => {
                input.addEventListener(eventName, this.highlight, false)
            });
            ;['dragleave', 'drop'].forEach(eventName => {
                input.addEventListener(eventName, this.unhighlight, false)
            });

            input.addEventListener('drop', e => {
                let dt = e.dataTransfer;
                let files = dt.files;

                let inputFile = input.querySelector('input[type="file"]');

                inputFile.files = files;

                this.fileList = [];

                // Loop on every files
                for (let i = 0; i < inputFile.files.length; i++) {
                    // Store the files name in the array fileList
                    this.fileList.push(inputFile.files[i]);
                }
                // Render the list with all the file name
                this.renderFileList(input);
            }, false);
        });
    }

    setChangeEvent(input) {
        let inputFile = input.querySelector('input[type="file"]');
        if(inputFile) {
            inputFile.addEventListener('change', e => {
                // Loop on every files
                for (let i = 0; i < inputFile.files.length; i++) {
                    // Store the files name in the array fileList
                    this.fileList.push(inputFile.files[i]);
                }
                // Render the list with all the file name
                this.renderFileList(input);
            });
        }
    }

    preventDefaults (e) {
        e.preventDefault();
        e.stopPropagation();
    }
    highlight(e) {
        this.classList.add('highlight');
        this.querySelector('label').classList.add('button--white');
    }
    unhighlight(e) {
        this.classList.remove('highlight');
        this.querySelector('label').classList.remove('button--white');
    }

    renderFileList(input) {
        const fileListDisplay = input.querySelector('.input--file .input__list');
        fileListDisplay.innerHTML = '';
        let listTitle = document.createElement('h4');
        listTitle.innerHTML = "Fichiers";
        listTitle.classList.add('input__list__title');
        fileListDisplay.appendChild(listTitle);
        this.fileList.forEach(function (file) {
            let fileDisplayEl = document.createElement('p');
            fileDisplayEl.classList.add('input__list__el');
            fileDisplayEl.innerHTML = file.name;
            fileListDisplay.appendChild(fileDisplayEl);
        });
    };
}