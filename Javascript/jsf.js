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

var norde = document.querySelector('.btn-norde');
norde.addEventListener('click', function() {
  document.body.classList.remove('pointe-est', 'pointe-ouest', 'pointe-sud', 'pointe-nord','pointe-nordo','pointe-sudo','pointe-sude');
  document.body.classList.add('pointe-norde');
})

var nordo = document.querySelector('.btn-nordo');
nordo.addEventListener('click', function() {
  document.body.classList.remove('pointe-est', 'pointe-ouest', 'pointe-sud','pointe-nord','pointe-sudo','pointe-sude','pointe-norde');
  document.body.classList.add('pointe-nordo');
})

var sudo = document.querySelector('.btn-sudo');
sudo.addEventListener('click', function() {
  document.body.classList.remove('pointe-est', 'pointe-ouest', 'pointe-sud','pointe-nord','pointe-norde', 'pointe-nordo','pointe-sude');
  document.body.classList.add('pointe-sudo');
})

var sude = document.querySelector('.btn-sude');
sude.addEventListener('click', function() {
  document.body.classList.remove('pointe-est', 'pointe-ouest', 'pointe-sud','pointe-nord','pointe-norde','pointe-nordo','pointe-sudo');
  document.body.classList.add('pointe-sude');
})