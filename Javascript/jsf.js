var est = document.querySelector('.btn-est');
est.addEventListener('click', function() {
  document.body.classList.remove('pointe-ouest', 'pointe-nord', 'pointe-sud','pointe-nordo','pointe-norde','pointe-sudo','pointe-sude');
  document.body.classList.add('pointe-est');
})

var ouest = document.querySelector('.btn-ouest');
ouest.addEventListener('click', function() {
  document.body.classList.remove('pointe-est', 'pointe-nord', 'pointe-sud','pointe-nordo','pointe-norde','pointe-sudo','pointe-sude');
  document.body.classList.add('pointe-ouest');
})

var sud = document.querySelector('.btn-sud');
sud.addEventListener('click', function() {
  document.body.classList.remove('pointe-est', 'pointe-ouest', 'pointe-nord','pointe-nordo','pointe-norde','pointe-sudo','pointe-sude');
  document.body.classList.add('pointe-sud');
})

var nord = document.querySelector('.btn-nord');
nord.addEventListener('click', function() {
  document.body.classList.remove('pointe-est', 'pointe-ouest', 'pointe-sud','pointe-nordo','pointe-norde','pointe-sudo','pointe-sude');
  document.body.classList.add('pointe-nord');
})

var nord = document.querySelector('.btn-norde');
nord.addEventListener('click', function() {
  document.body.classList.remove('pointe-est', 'pointe-ouest', 'pointe-sud', 'pointe-nord','pointe-nordo','pointe-sudo','pointe-sude');
  document.body.classList.add('pointe-norde');
})

var nord = document.querySelector('.btn-nordo');
nord.addEventListener('click', function() {
  document.body.classList.remove('pointe-est', 'pointe-ouest', 'pointe-sud','pointe-nord','pointe-sudo','pointe-sude','pointe-norde');
  document.body.classList.add('pointe-nordo');
})

var sud = document.querySelector('.btn-sudo');
sud.addEventListener('click', function() {
  document.body.classList.remove('pointe-est', 'pointe-ouest', 'pointe-sud','pointe-nord','pointe-norde', 'pointe-nordo','pointe-sude');
  document.body.classList.add('pointe-sudo');
})

var sud = document.querySelector('.btn-sude');
sud.addEventListener('click', function() {
  document.body.classList.remove('pointe-est', 'pointe-ouest', 'pointe-sud','pointe-nord','pointe-norde','pointe-nordo','pointe-sudo');
  document.body.classList.add('pointe-sude');
})
