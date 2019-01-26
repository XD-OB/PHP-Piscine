const todos = [];

String.prototype.isEmpty = function() {
    return (this.length === 0 || !this.trim());
};

function fill(arr) {
	let str = '<h1 id="title">To-do list</h1>';
    arr.forEach(cur => {
		str += `<div class="todo" data-id="${cur[0]}">${cur[1]}</div>`;
		todos.push([Number(cur[0]), cur[1]]);
	});
	$('#ft_list').html(`${str}<button id="new" name="new">New</button>`);
	$('#new').click(e => {
		let todo = prompt('Fill to-do');
		const id = todos.length ? todos[0][0] + 1 : 1;
		if (!todo.isEmpty()) {
			$.ajax({
				type: 'GET',
				url: `/d09/ex04/insert.php?id=${id}&todo=${todo}`,
				error: () => alert('Oups something went wrong ... couldn\'t connect to the server')
			});
			$('#title').after(`<div class="todo" data-id="${id}">${todo}</div>`);
			todos.unshift([id, todo]);
		}
	});
}

$.ajax({
	type: 'GET',
	url: '/d09/ex04/select.php',
	success: res => fill(res),
	error: () => alert('Oups something went wrong ... couldn\'t connect to the server')
});

$('#ft_list').click(e => {
	if (e.target.classList.contains('todo'))
		if (confirm(`Are you sure you want to delete "${e.target.textContent}" ?`)) {
			todos.forEach((cur, i, arr) => cur[1] == e.target.textContent ? arr.splice(i, 1) : 1);
			console.log(e.target.dataset.id)
			$.ajax({
				type: 'GET',
				url: `/d09/ex04/delete.php?id=${e.target.dataset.id}&todo=${e.target.textContent}`,
				error: () => alert('Oups something went wrong ... couldn\'t connect to the server')
			});
			e.target.remove();
		}
});