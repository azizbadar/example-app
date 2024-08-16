<!-- resources/views/welcome.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Real-Time Update</title>
    @vite('resources/js/app.js')
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
</head>
<body>
    <form id="optionForm">
        <select id="optionSelect">
            <option value="Option 1">Option 1</option>
            <option value="Option 2">Option 2</option>
            <option value="Option 3">Option 3</option>
        </select>
        <button type="submit">Submit</button>
    </form>

    <div id="display"></div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Pusher setup
            window.Echo.channel('option-channel')
                .listen('OPtionSelected', (e) => {
                    console.log(e)
                    document.getElementById('display').innerText = e.data;
                });

            // Form submission
            document.getElementById('optionForm').addEventListener('submit', function (e) {
                e.preventDefault();
                var selectedOption = document.getElementById('optionSelect').value;

                fetch('/option', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ option: selectedOption })
                }).then(response => response.json())
                  .then(data => console.log(data));
            });
        });
    </script>
</body>
</html>
