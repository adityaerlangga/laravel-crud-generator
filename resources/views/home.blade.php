<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.4/font/bootstrap-icons.min.css" integrity="sha512-yU7+yXTc4VUanLSjkZq+buQN3afNA4j2ap/mxvdr440P5aW9np9vIr2JMZ2E5DuYeC9bAoH9CuCR7SJlXAa4pg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="/assets/img/icons/icon-48x48.png" />

    <title>Laravel CRUD Generator</title>
    <link href="/assets/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/highlightjs/styles/base16/railscasts.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        input,
        button,
        select,
        a,
        textarea {
            box-shadow: none !important
        }

        .code_base {
            max-height: 400px;
            overflow-y: scroll
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="#">
                    <span class="align-middle">Laravel 9 CRUD Generator</span>
                </a>
                <ul class="sidebar-nav">
                    <li class="sidebar-item active">
                        <a class="sidebar-link" href="#">
                            <span>CRUD Generator Tools</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg shadow-sm">
                <a class="sidebar-toggle js-sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>

                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">
                    </ul>
                </div>
            </nav>

            <main class="content">
                <div class="container-fluid p-0">
                    <div class="alert pb-0 d-none" role="alert" id="js_alert">
                        <h4 class="alert-heading" id="title"></h4>
                        <div id="subtitle"></div>
                    </div>
                    <div class="row row-cols-1 row-cols-lg-2 mb-3">
                        <div class="col">
                            <h1 class="h3"><strong>Laravel</strong> CRUD</h1>
                            <span>Laravel CRUD Generator | Laravel 9 Bootstrap 5</span>
                        </div>
                        <div class="col mt-3 mt-lg-0 d-flex justify-content-lg-end">
                            <div><button class="btn btn onclick="window.history.back()">Kembali</button></div>
                        </div>
                    </div>
                    <form action="/laravel-crud/generate" method="post" id="gen_form">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="row row-cols-1 row-cols-lg-3">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="model">Nama Model</label>
                                            <small class="d-block">ex: User</small>
                                            <input type="text" class="form-control" name="model" id="model"
                                                placeholder="Masukkan Nama Model" onkeyup="remove_space(event)">
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="bg-light">
                                            <tr>
                                                <th class="text-nowrap" style="max-width: 50px">No</th>
                                                <th class="text-nowrap">
                                                    <span>Judul</span>
                                                    <small class="d-block">ex: Nama Lengkap</small>
                                                </th>
                                                <th class="text-nowrap">
                                                    <span>Nama Data</span>
                                                    <small class="d-block">ex: nama_lengkap</small>
                                                </th>
                                                <th class="text-nowrap">
                                                    <span>Element</span>
                                                    <small class="d-block">ex: Input Text</small>
                                                </th>
                                                <th class="text-nowrap">
                                                    <span>Validator</span>
                                                    <small class="d-block">ex: required|max:20|array</small>
                                                </th>
                                                <th class="text-nowrap"></th>
                                            </tr>
                                        </thead>
                                        <tbody id="base_coloumn">
                                            <tr>
                                                <td class="text-nowrap">1</td>
                                                <td class="text-nowrap">
                                                    <input type="text" class="form-control" name="title[]"
                                                        placeholder="Masukkan Judul" style="min-width: 200px">
                                                </td>
                                                <td class="text-nowrap">
                                                    <input type="text" class="form-control" name="data_name[]"
                                                        placeholder="Masukkan Nama Data" style="min-width: 200px"
                                                        onkeyup="space_to_underscore(event)">
                                                </td>
                                                <td class="text-nowrap">
                                                    <select class="form-select" name="element[]"
                                                        style="min-width: 200px">
                                                        <option value="">--Pilih Element--</option>
                                                        <option value="1">Input Text</option>
                                                        <option value="2">Input Number</option>
                                                        <option value="3">Select</option>
                                                        <option value="4">Textarea</option>
                                                    </select>
                                                </td>
                                                <td class="text-nowrap">
                                                    <input type="text" class="form-control" name="validator[]"
                                                        id="input_validator_1" placeholder="Masukkan Validator"
                                                        style="min-width: 200px" onkeyup="space_to_stand(event)">
                                                </td>
                                                <td class="text-nowrap">
                                                    <i class="bi bi-trash3 fs-3 text-secondary"></i>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex justify-content-end mt-2">
                                    <button type="button" class="btn btn-primary me-2" onclick="add_coloumn()">Tambah Kolom</button>
                                    <button type="button" class="btn btn-success" onclick="gen_form(event,'#gen_form')">Generate</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="card d-none" id="base_code">
                        <div class="card-body">
                            <div class="row row-cols-1 row-cols-lg-1">
                                <div class="col">
                                    <div class="d-flex justify-content-between mb-2">
                                        <b>Command</b>
                                        <button class="btn btn-success btn-sm" onclick="copyToClipboard(event,'#result_command')">Copy</button>
                                    </div>
                                    <pre><code class="code_base language-php" id="result_command">Kode Akan Muncul Disini</code></pre>
                                </div>
                                <div class="col">
                                    <div class="d-flex justify-content-between mb-2">
                                        <b>Route</b>
                                        <button class="btn btn-success btn-sm" onclick="copyToClipboard(event,'#result_route')">Copy</button>
                                    </div>
                                    <pre><code class="code_base language-php" id="result_route">Kode Akan Muncul Disini</code></pre>
                                </div>
                                <div class="col">
                                    <div class="d-flex justify-content-between mb-2">
                                        <b>Controller</b>
                                        <button class="btn btn-success btn-sm" onclick="copyToClipboard(event,'#result_controller')">Copy</button>
                                    </div>
                                    <pre><code class="code_base language-php" id="result_controller">Kode Akan Muncul Disini</code></pre>
                                </div>
                                <div class="col">
                                    <div class="d-flex justify-content-between mb-2">
                                        <b>Model</b>
                                        <button class="btn btn-success btn-sm" onclick="copyToClipboard(event,'#result_model')">Copy</button>
                                    </div>
                                    <pre><code class="code_base language-php" id="result_model">Kode Akan Muncul Disini</code></pre>
                                </div>
                                <div class="col">
                                    <div class="d-flex justify-content-between mb-2">
                                        <b>Migration</b>
                                        <button class="btn btn-success btn-sm" onclick="copyToClipboard(event,'#result_migration')">Copy</button>
                                    </div>
                                    <pre><code class="code_base language-php" id="result_migration">Kode Akan Muncul Disini</code></pre>
                                </div>
                                <div class="col">
                                    <div class="d-flex justify-content-between mb-2">
                                        <b>Index Table</b>
                                        <button class="btn btn-success btn-sm" onclick="copyToClipboard(event,'#result_index')">Copy</button>
                                    </div>
                                    <pre><code class="code_base language-html" id="result_index">&lt;div&gt;Kode Akan Muncul Disini&lt;/div&gt;</code></pre>
                                </div>
                                <div class="col">
                                    <div class="d-flex justify-content-between mb-2">
                                        <b>Create Form</b>
                                        <button class="btn btn-success btn-sm" onclick="copyToClipboard(event,'#result_create')">Copy</button>
                                    </div>
                                    <pre><code class="code_base language-php" id="result_create">&lt;div&gt;Kode Akan Muncul Disini&lt;/div&gt;</code></pre>
                                </div>
                                <div class="col">
                                    <div class="d-flex justify-content-between mb-2">
                                        <b>Edit Form</b>
                                        <button class="btn btn-success btn-sm" onclick="copyToClipboard(event,'#result_edit')">Copy</button>
                                    </div>
                                    <pre><code class="code_base language-html" id="result_edit">&lt;div&gt;Kode Akan Muncul Disini&lt;/div&gt;</code></pre>
                                </div>
                            </div>
                            <i>Tetap periksa kembali code hasil generate sebelum aplikasi di publish.</i>
                        </div>
                    </div>

                    <div class="d-none" id="clonner">
                        <anjay1 id="tr_increment">
                            <anjay2 class="text-nowrap">increment</anjay2>
                            <anjay2 class="text-nowrap">
                                <input type="text" class="form-control" name="title[]"
                                    placeholder="Masukkan Judul" style="min-width: 200px">
                            </anjay2>
                            <anjay2 class="text-nowrap">
                                <input type="text" class="form-control" name="data_name[]"
                                    placeholder="Masukkan Nama Data" style="min-width: 200px"
                                    onkeyup="space_to_underscore(event)">
                            </anjay2>
                            <anjay2 class="text-nowrap">
                                <select class="form-select" name="element[]" style="min-width: 200px">
                                    <option value="">--Pilih Element--</option>
                                    <option value="1">Input Text</option>
                                    <option value="2">Input Number</option>
                                    <option value="3">Select</option>
                                    <option value="4">Textarea</option>
                                </select>
                            </anjay2>
                            <anjay2 class="text-nowrap">
                                <input type="text" class="form-control" name="validator[]" id="input_validator_1"
                                    placeholder="Masukkan Validator" style="min-width: 200px"
                                    onkeyup="space_to_stand(event)">
                            </anjay2>
                            <anjay2 class="text-nowrap">
                                <i class="bi bi-trash3 fs-3 text-danger" onclick="remove_coloumn('#tr_increment')"></i>
                            </anjay2>
                        </anjay1>
                    </div>

                </div>
            </main>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                            <p class="mb-0">
                                <strong>CRUD Generator</strong> &copy; Aditya 2023
                            </p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/assets/js/app.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/highlight.min.js"></script>
    <script>
        hljs.highlightAll();
    </script>
    <script>
        var no = 1;

        function add_coloumn() {
            no++;
            let base = $('#base_coloumn')
            let clonner = $('#clonner').clone()
                .html()
                .replaceAll('anjay1', 'tr')
                .replaceAll('anjay2', 'td')
                .replaceAll('increment', no)
            base.append(clonner)
        }

        function remove_coloumn(el_id) {
            $(el_id).remove()
        }

        function gen_form(event, form_id) {
            let form = $(form_id)
            let action = form.attr('action')
            let method = form.attr('method')
            let data = new FormData(form[0])
            let button = $(event.target)
            let inner_button = button.html();
            let spinner = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>';
            var interval;
            $.ajax({
                url: action,
                method: method,
                processData: false,
                contentType: false,
                data: data,
                beforeSend: function() {
                    button.html(spinner)
                    let alert = $('#js_alert').removeClass('alert-danger').addClass('d-none')
                    alert.find('#title').text('')
                    alert.find('#subtitle').html('')
                    interval = setInterval(() => {
                        hljs.highlightAll();
                    }, 100);
                },
                success: function(response) {
                    console.log(response)
                    $('#base_code').removeClass('d-none')
                    $('#result_command').html(response.data.command)
                    $('#result_index').html(response.data.index)
                    $('#result_create').html(response.data.create)
                    $('#result_edit').html(response.data.edit)
                    $('#result_controller').html(response.data.controller)
                    $('#result_route').html(response.data.route)
                    $('#result_model').html(response.data.model)
                    $('#result_migration').html(response.data.migration)
                },
                error: function(response) {
                    let message = response.responseJSON.message
                    let data = response.responseJSON.data
                    let alert = $('#js_alert').removeClass('d-none').addClass('alert-danger')
                    alert.find('#title').text(message)
                    let ul = $('<ul></ul>').addClass('ps-3 py-0')
                    $.each(data, function(index, item) {
                        let li = '<li>' + item + '</li>'
                        ul.append(li)
                    })
                    alert.find('#subtitle').append(ul)
                },
                complete: function() {
                    button.html(inner_button)
                    setTimeout(() => {
                        clearInterval(interval)
                    }, 500);
                }
            })
        }

        function remove_space(event) {
            $(event.target).val($(event.target).val().replaceAll(' ', ''))
        }

        function space_to_underscore(event) {
            $(event.target).val($(event.target).val().replaceAll(' ', '_').toLowerCase())
        }

        function space_to_stand(event) {
            $(event.target).val($(event.target).val().replaceAll(' ', '|').replaceAll(',', '|').toLowerCase())
        }
    </script>

    <script>
        function copyToClipboard(event, elementId) {
            var copyText = $(elementId)
            copyText.select();
            navigator.clipboard.writeText(copyText.text());
            $(event.target).text('Copied')
        }
    </script>

</body>

</html>
