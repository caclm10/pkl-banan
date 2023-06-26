const swal = Swal.mixin({
    customClass: {
        confirmButton: 'btn btn-primary',
        cancelButton: 'btn btn-danger'
    },
    buttonsStyling: false
})

function formatDate(dateString) {
    const options = { day: '2-digit', month: 'long', year: 'numeric' };
    const date = new Date(dateString);
    return date.toLocaleDateString('id-ID', options);
}

function showFullLoader() {
    document.querySelector(`#fullLoader`).classList.remove('d-none')
    document.body.classList.add('overflow-hidden')
}

function hideFullLoader() {
    document.querySelector(`#fullLoader`).classList.add('d-none')
    document.body.classList.remove('overflow-hidden')
}

const nomorTelpInput = document.querySelector(`#nomorTelepon`)
const passwordGenerator = document.querySelector(`#passwordGenerator`)

for (const input of document.querySelectorAll(`[data-autosize]`)) {
    autosize(input)
}

for (const input of document.querySelectorAll(`[data-image-preview]`)) {
    const container = document.createElement('div')
    const img = document.createElement('img')

    container.classList.add('image-preview')

    if (!input.dataset.imagePreview) {
        container.classList.add('d-none')
    } else {
        img.src = '/' + input.dataset.imagePreview
    }

    container.appendChild(img)
    input.parentElement.appendChild(container)


    input.addEventListener('change', event => {
        const file = input.files[0]

        if (file) {
            container.classList.remove('d-none')
            img.src = URL.createObjectURL(file)
        } else {
            if (input.dataset.imagePreview) {
                img.src = '/' + input.dataset.imagePreview
            } else {
                container.classList.add('d-none')
            }
        }
    })
}

for (const button of document.querySelectorAll(`[data-delete-form]`)) {
    const form = document.createElement('form')
    const methodInput = document.createElement('input')

    methodInput.name = "_method"
    methodInput.value = "DELETE"

    form.action = button.dataset.deleteForm
    form.method = "POST"
    form.classList.add('d-none')
    form.appendChild(methodInput)

    button.parentElement.appendChild(form)

    button.addEventListener('click', () => {
        if (confirm('Hapus data ini?')) {
            form.submit()
        }
    })
}

for (const form of document.querySelectorAll(`form`)) {
    let active = false
    form.addEventListener('submit', event => {
        if (active) {
            event.preventDefault()
        } else {
            if (nomorTelpInput) {
                nomorTelpInput.value = nomorTelpInput.value.split('-').join('')
            }
            active = true
        }
    })
}

for (const el of document.querySelectorAll(`[data-rte]`)) {
    tinymce.init({
        target: el,
        menubar: false,
        toolbar: 'bold italic',
        plugins: ['autoresize'],
        setup: editor => {
            editor.on('keydown', event => {
                if (event.code === "Tab") {
                    editor.execCommand('mceInsertContent', false, '&emsp;&emsp;')
                    event.preventDefault()
                }
            })
        }
    })
}


if (nomorTelpInput) {
    IMask(nomorTelpInput, {
        mask: '0000-0000-0000-000'
    })
}

if (passwordGenerator) {
    const input = document.querySelector(`[name="password"]`)
    const characters = `ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789./?@!&`;

    passwordGenerator.addEventListener('click', () => {
        let result = '';

        for (let i = 0; i < 8; i++) {
            result += characters.charAt(Math.floor(Math.random() * characters.length));
        }

        input.value = result
    })
}

const projectDetailModal = document.getElementById('projectDetailModal')
if (projectDetailModal) {
    const defaultSortElementArray = Array.from(document.querySelectorAll(`[data-sort]`))

    function sortProjects(sortBy) {
        const projectList = document.querySelector(`[data-project-list]`)

        const sortElements = document.querySelectorAll(`[data-sort]`)

        const sortElementArray = Array.from(sortElements)

        sortElementArray.sort((a, b) => {
            let valueA, valueB

            const projectA = JSON.parse(a.dataset.sort)
            const projectB = JSON.parse(b.dataset.sort)

            if (sortBy === "tanggal_mulai" || sortBy === "tanggal_selesai") {
                valueA = new Date(projectA[sortBy]);
                valueB = new Date(projectB[sortBy]);
            } else if (sortBy === "nama") {
                valueA = projectA[sortBy].toLowerCase();
                valueB = projectB[sortBy].toLowerCase();
            }

            if (valueA < valueB) {
                return -1
            }
            if (valueA > valueB) {
                return 1
            }
            return 0
        })

        if (sortBy) {
            sortElementArray.forEach(project => {
                projectList.appendChild(project)
            })
        } else {
            defaultSortElementArray.forEach(project => {
                projectList.appendChild(project)
            })
        }
    }

    const sortSelect = document.querySelector("#sortSelect")
    sortSelect.addEventListener("change", function () {
        const sortBy = this.value
        sortProjects(sortBy)
    })


    const modalInstance = bootstrap.Modal.getOrCreateInstance(projectDetailModal)
    const projectDetailImage = document.querySelector(`#projectDetailModalImage`)
    const mainProjectDetail = document.querySelector(`#mainProjectDetail`)
    const loaderProjectDetail = document.querySelector(`#loaderProjectDetail`)

    const lightbox = new FsLightbox()

    lightbox.props.onOpen = () => {
        modalInstance._config.keyboard = false
    }

    lightbox.props.onClose = () => {
        modalInstance._config.keyboard = true
    }

    projectDetailImage.addEventListener("click", () => {
        if (lightbox.props.sources.length > 0) {
            lightbox.open()
        }
    })

    mainProjectDetail.classList.add('d-none')
    loaderProjectDetail.classList.remove('d-none')

    projectDetailModal.addEventListener('show.bs.modal', event => {
        const button = event.relatedTarget
        const projectId = button.getAttribute('data-project-id')

        fetch(`/proyek/${projectId}`, {
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
            .then(response => response.json())
            .then(data => {
                // Update the modal's content.
                const modalTitle = projectDetailModal.querySelector('.modal-title')
                const tanggalProyek = projectDetailModal.querySelector('#tanggalProyek')
                const deskripsiProyek = projectDetailModal.querySelector('#deskripsiProyek')
                const pekerjaProyek = projectDetailModal.querySelector('#pekerjaProyek')

                modalTitle.textContent = `Proyek ${data.nama}`
                tanggalProyek.textContent = `${formatDate(data.tanggal_mulai)} - ${formatDate(data.tanggal_selesai)}`
                deskripsiProyek.textContent = data.deskripsi

                pekerjaProyek.innerHTML = ``
                for (const pekerja of data.pekerja) {
                    pekerjaProyek.insertAdjacentHTML('beforeend', `
                        <div class= "col">
                            <div class="team-list-item">
                                <div class="team-picture">
                                    <img src="/${pekerja.path_gambar || 'images/person-placeholder.jpg'}" alt="picture" class="">
                                </div>
                                <div class="team-header">
                                    <h4 class="mb-0 text-primary">${pekerja.nama}</h4>
                                    <h5 class="fs-6 mt-0">${pekerja.jabatan}</h5>
                                </div>
                            </div>
                        </div>
                    `)
                }

                projectDetailImage.src = `/${data.gambar[0]?.path_gambar || 'images/1106x204.png'}`
                lightbox.props.sources = data.gambar.map(gambar => `/${gambar.path_gambar}`)


                mainProjectDetail.classList.remove('d-none')
                loaderProjectDetail.classList.add('d-none')
            })
    })
}

const adminSidebar = document.querySelector('#adminSidebar')
const adminWrapper = document.querySelector('.admin-wrapper')
const mediaQuery = window.matchMedia('(max-width: 1247.98px)')

function handleMediaQueryChange(mediaQuery) {
    if (adminSidebar) {
        const sidebarWidth = getComputedStyle(document.documentElement).getPropertyValue('--admin-sidebar-width')

        if (mediaQuery.matches) {
            adminSidebar.style.width = '0'
            adminWrapper.style.paddingLeft = '0'
        } else {
            adminSidebar.style.width = sidebarWidth
            adminWrapper.style.paddingLeft = sidebarWidth
        }
    }
}

handleMediaQueryChange(mediaQuery)

mediaQuery.addEventListener('change', handleMediaQueryChange)

const projectImageList = document.querySelector('.project-image-list');
if (projectImageList) {
    new Sortable(projectImageList, {
        handle: '.btn-drag',
        animation: 150,

        onEnd: function (evt) {
            // Mengambil semua elemen yang diurutkan
            const items = Array.from(evt.to.children)

            // Mendapatkan urutan gambar baru
            const newOrder = items.map((item, index) => {
                const imageId = item.dataset.imageId // Menggantinya dengan ID gambar sesuai kebutuhan Anda
                return {
                    id: imageId,
                    urutan: index + 1
                }
            })

            // Mengirim data pengurutan ke server
            fetch(`/admin/proyek/${projectImageList.dataset.projectId}/gambar`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(newOrder)
            })
                .then(response => {
                    if (response.ok) {
                        console.log('Pengurutan berhasil.');
                        // Tindakan setelah pengurutan berhasil dilakukan
                    } else {
                        console.error('Terjadi kesalahan saat mengirim pengurutan.');
                        // Tindakan jika terjadi kesalahan saat mengirim pengurutan
                    }
                })
                .catch(error => {
                    console.error('Terjadi kesalahan saat mengirim pengurutan:', error);
                });
        }
    })
}


const inputGambarLabel = document.querySelector(`#inputGambarLabel`)
if (inputGambarLabel) {
    const projectId = document.querySelector(`[data-project-id]`).dataset.projectId
    function deleteImage(imageId, imageElement) {
        const confirmation = confirm(`Apakah Anda yakin ingin menghapus gambar ini ? `)

        if (confirmation) {
            showFullLoader()
            fetch(`/admin/proyek/${projectId}/gambar/${imageId}`, {
                method: 'DELETE'
            })
                .then(response => {
                    if (response.ok) {
                        hideFullLoader()
                        imageElement.remove()
                        swal.fire(
                            'Berhasil!',
                            'Gambar berhasil dihapus.',
                            'success'
                        )
                    } else {
                        console.error(`Gagal menghapus gambar dengan ID ${imageId}.`)
                    }
                })
                .catch(error => {
                    console.error('Terjadi kesalahan saat mengirim permintaan hapus gambar:', error)
                })
        }
    }

    function createImageElement(imageUrl, imageId) {
        const col = document.createElement('div')
        col.classList.add('col')
        col.dataset.imageId = imageId

        const listItem = document.createElement('div')
        listItem.classList.add('project-image-list-item')

        const image = document.createElement('img')
        image.src = `/${imageUrl}`
        image.alt = 'project'

        const actionContainer = document.createElement('div')
        actionContainer.classList.add('project-image-list-item-action')

        const dragButton = document.createElement('button')
        dragButton.classList.add('btn', 'btn-link', 'btn-drag')
        dragButton.innerHTML = '<span class="iconify" data-icon="mdi:drag"></span>'

        const deleteButton = document.createElement('button')
        deleteButton.classList.add('btn', 'btn-link', 'text-danger')
        deleteButton.innerHTML = '<span class="iconify" data-icon="mdi:delete"></span>'
        deleteButton.setAttribute('data-image-id', imageId)

        deleteButton.addEventListener('click', () => {
            deleteImage(imageId, col)
        })

        actionContainer.appendChild(dragButton)
        actionContainer.appendChild(deleteButton)

        listItem.appendChild(image)
        listItem.appendChild(actionContainer)

        col.appendChild(listItem)

        return col
    }

    const container = document.querySelector('.project-image-list')
    const input = document.querySelector(`#gambar`)

    inputGambarLabel.addEventListener('click', () => {
        input.value = null
        input.click()
    })

    input.addEventListener('change', async (event) => {
        const selectedFile = event.target.files[0]


        if (selectedFile) {
            showFullLoader()

            const formData = new FormData();
            formData.append('gambar', selectedFile);

            try {
                const response = await fetch(`/admin/proyek/${projectId}/gambar`, {
                    method: 'POST',
                    body: formData
                });

                if (response.ok) {
                    const responseData = await response.json()

                    hideFullLoader()

                    const newImageElement = createImageElement(responseData['path_gambar'], responseData['id'])
                    container.appendChild(newImageElement)

                    swal.fire(
                        'Berhasil!',
                        'Gambar berhasil ditambah.',
                        'success'
                    )
                } else if (response.status === 422) {

                    const errorData = await response.json();

                    // Menampilkan pesan error menggunakan alert
                    alert(errorData.errors["gambar"]);
                } else {

                    console.error('Terjadi kesalahan:', response.status);
                }
            } catch (error) {

                console.error('Terjadi kesalahan saat mengirim file:', error)
            }
        }

        // Contoh tindakan: Konsol log nama file
        console.log('Nama File:', selectedFile.name)
    })

    // Mengambil semua tombol delete dengan atribut data-image-id
    const deleteImageButtons = document.querySelectorAll('button[data-image-id]');

    // Menambahkan event listener untuk setiap tombol delete
    deleteImageButtons.forEach((button) => {
        button.addEventListener('click', () => {
            deleteImage(button.dataset.imageId, button.parentNode.parentNode.parentNode)
        })
    })
}


const addWorkerModal = document.getElementById('addWorkerModal')
const teamList = document.querySelector(`#teamList`)
if (addWorkerModal) {
    function addDeleteListener(button) {
        button.addEventListener('click', event => {
            if (confirm("Apakah Anda yakin ingin menghapus pekerja ini?")) {
                showFullLoader()

                fetch(`/admin/proyek/${teamList.dataset.projectId}/pekerja/${button.dataset.deleteWorkerId}`, {
                    method: `DELETE`,
                    headers: {
                        'Content-Type': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                    .then(resp => resp.json())
                    .then(() => {
                        hideFullLoader()
                        button.parentNode.parentNode.parentNode.remove()

                        swal.fire(
                            'Berhasil!',
                            'Pekerja berhasil dihapus.',
                            'success'
                        )
                    })
            }

        })
    }

    function populateOptions(remainingData, workersSelect) {
        workersSelect.innerHTML = ''

        remainingData.forEach(item => {
            const option = document.createElement('option')
            option.value = item.id
            option.textContent = item.nama + ' - ' + item.jabatan
            workersSelect.appendChild(option)
        });
    }

    const addWorkerForm = document.querySelector(`#addWorkerForm`)
    const deleteButtons = document.querySelectorAll(`.btn-delete`)

    let loading
    let remainingTeams, remainingAdditionalWorkers

    for (const button of deleteButtons) {
        addDeleteListener(button)
    }

    addWorkerModal.addEventListener('show.bs.modal', event => {
        const button = event.relatedTarget
        const projectId = button.getAttribute('data-project-id')

        const addWorkerFormInner = addWorkerForm.innerHTML

        addWorkerForm.innerHTML = `
            <div class="d-flex justify-content-center">
                <div class="spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        `


        loading = true
        fetch(`/admin/proyek/${projectId}/pekerja`, {
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
            .then(response => response.json())
            .then(data => {
                addWorkerForm.innerHTML = addWorkerFormInner

                const typeSelect = document.querySelector('#tipe')
                const workersSelect = document.querySelector('#pekerja')

                remainingTeams = data.remainingTeams
                remainingAdditionalWorkers = data.remainingAdditionalWorkers

                // Menambahkan opsi saat fetch pertama kali selesai
                populateOptions(remainingTeams, workersSelect);

                typeSelect.addEventListener('change', () => {
                    const selectedType = typeSelect.value

                    // Menentukan opsi berdasarkan selectedType
                    if (selectedType === 'tim') {
                        populateOptions(remainingTeams, workersSelect)
                    } else if (selectedType === 'pekerja_tambahan') {
                        populateOptions(remainingAdditionalWorkers, workersSelect)
                    }
                })
            })
            .catch(error => {
                // Tangani kesalahan jika terjadi
                console.error('Terjadi kesalahan:', error)
            })
            .finally(() => {
                loading = false
            })

    })
    addWorkerForm.addEventListener('submit', event => {
        event.preventDefault()

        if (loading) return

        const typeSelect = document.querySelector('#tipe')
        const workersSelect = document.querySelector('#pekerja')

        const submitButton = event.submitter
        const submitButtonInner = submitButton.innerHTML

        submitButton.disabled = true
        submitButton.innerHTML = `
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Loading...
                `

        fetch(addWorkerForm.action, {
            method: "POST",
            body: JSON.stringify({
                tipe: typeSelect.value,
                pekerja: workersSelect.value
            }),
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
            .then(response => response.json())
            .then(data => {
                submitButton.disabled = false
                submitButton.innerHTML = submitButtonInner

                const workersElements = document.querySelectorAll(`[data-${typeSelect.value === 'tim' ? 'team' : 'additional'}-workers]`)

                let lastWorkerElement
                if (workersElements.length > 0) {
                    lastWorkerElement = workersElements[workersElements.length - 1]
                }

                const newWorkerElement = document.createElement(`div`)
                newWorkerElement.setAttribute(`data-${typeSelect.value === 'tim' ? 'team' : 'additional'}-workers`, "")
                newWorkerElement.classList.add('col')

                newWorkerElement.innerHTML = `
                            <div class= "team-list-item">
                                <div class="team-picture">
                                    <img src="/${data.path_gambar || 'images/person-placeholder.jpg'}" alt="picture" class="">
                                    <button type="button" class="btn text-danger btn-link btn-delete" data-delete-worker-id="${data.id_pekerja_proyek}">
                                        <span class="iconify" data-icon="mdi:delete"></span>
                                    </button>
                                </div>
                                <div class="team-header">
                                    <h4 class="mb-0 text-primary">${data.nama}</h4>
                                    <h5 class="fs-6 mt-0">${data.jabatan}</h5>
                                </div>
                            </div>
                        `

                const deleteButton = newWorkerElement.querySelector(`[data-delete-worker-id]`)

                addDeleteListener(deleteButton)

                if (lastWorkerElement) {
                    lastWorkerElement.insertAdjacentElement('afterend', newWorkerElement)
                } else {
                    if (typeSelect.value === 'tim') {
                        teamList.prepend(newWorkerElement)
                    } else {
                        teamList.appendChild(newWorkerElement)
                    }
                }

                if (typeSelect.value === 'tim') {
                    remainingTeams = remainingTeams.filter(worker => worker.id !== data.id)
                    populateOptions(remainingTeams, workersSelect)
                } else {
                    remainingAdditionalWorkers = remainingAdditionalWorkers.filter(worker => worker.id !== data.id)
                    populateOptions(remainingAdditionalWorkers, workersSelect)
                }

                swal.fire(
                    'Berhasil!',
                    'Pekerja berhasil ditambah.',
                    'success'
                )
            })
    })
}