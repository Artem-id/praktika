const input = document.querySelector('#todo-input')
const btnAdd = document.querySelector('#todo-add')
const todoList = document.querySelector('.todo-list')
const todoRemove = document.querySelectorAll('.todo-remove')
function completeCheck(e) {
  const span = e.target.nextElementSibling
  span.style.textDecoration = 'line-through'
}
todoList.addEventListener('click', e => {
   if(e.target.classList.contains('todo-check')) {
    console.log('check');
  }
  if (e.target.classList.contains('todo-remove')) {
      const li = e.target.closest('li')
      var element = document.querySelector('input[type=checkbox]');    
      if (element.checked) {
        li.remove()
      } else {alert('Вы не можете удалить невыполненный пункт.')} 
  }
})
btnAdd.addEventListener('click', () => {
  const value = input.value
  if (value !== '') {
    todoList.innerHTML += `
      <li class="todo-item">
      <input type="checkbox" class="todo-check">
        <span> ${value}</span>
        <button class="todo-remove">&times;</button>
      </li>`
    input.value = ''} else {
      alert('Поле ввода не должно быть пустым. Повторите попытку снова.')
    }
  const todoChecks = document.querySelectorAll('.todo-check')
  todoChecks.forEach(input => 
    input.addEventListener('click', e => completeCheck(e))
  )
})