document.getElementById('measurement-form').addEventListener('submit', function (e) {
	e.preventDefault();

	const formData = new FormData(this);

	fetch('submit.php', {
		method: 'POST',
		body: formData
	})
		.then(response => response.text())
		.then(data => {
			alert(data); // Выводим ответ сервера
			this.reset(); // Очищаем форму
		})
		.catch(error => {
			console.error('Ошибка:', error);
		});
});
