<?php


// $router->get('/', __DIR__.'/controllers/authontification/login.php');
$router->get('/login', __DIR__.'/controllers/authontification/login.php');
$router->post('/login', __DIR__.'/controllers/authontification/login.php');

$router->get('/Singup', __DIR__.'/controllers/authontification/SingUp.php');
$router->post('/Singup', __DIR__.'/controllers/authontification/SingUp.php');

$router->get('/chat/:id', __DIR__.'/controllers/chat/chat.php');
$router->post('/chat/:id', __DIR__.'/controllers/chat/chat.php');

$router->get('/chat/received/:id', __DIR__.'/controllers/chat/receivedChat.php');

$router->get('/chat/chatDetails/:id', __DIR__.'/controllers/chat/chatDetails.php');


$router->get('/recruiter/info', __DIR__.'/controllers/recruiter/info.php');
$router->post('/recruiter/info', __DIR__.'/controllers/recruiter/info.php');

$router->get('/recruiter/initialFilter', __DIR__.'/controllers/recruiter/initialFilter.php');
$router->post('/recruiter/initialFilter', __DIR__.'/controllers/recruiter/initialFilter.php');

$router->get('/recruiter/addOffer', __DIR__.'/controllers/recruiter/addOffer.php');
$router->post('/recruiter/addOffer', __DIR__.'/controllers/recruiter/addOffer.php');

$router->get('/recruiter', __DIR__.'/controllers/recruiter/candidatures.php');
$router->get('/recruiter/home', __DIR__.'/controllers/recruiter/home.php');

$router->get('/recruiter/candidatures', __DIR__.'/controllers/recruiter/candidatures.php');
$router->get('/recruiter/searchByscore', __DIR__.'/controllers/recruiter/search.php');


$router->get('/condidate', __DIR__.'/controllers/condidate/home.php');
$router->get('/condidate/home', __DIR__.'/controllers/condidate/home.php');
$router->delete('/condidate/home/:id', __DIR__.'/controllers/condidate/home.php');
$router->put('/condidate/home/:id', __DIR__.'/controllers/condidate/home.php');
$router->post('/condidate/home', __DIR__.'/controllers/condidate/home.php');

$router->get('/condidate/competence', __DIR__.'/controllers/condidate/competence.php');
$router->get('/condidate/competence', __DIR__.'/controllers/condidate/competence.php');
$router->delete('/condidate/competence/:id', __DIR__.'/controllers/condidate/competence.php');
$router->put('/condidate/competence/:id', __DIR__.'/controllers/condidate/competence.php');
$router->post('/condidate/competence', __DIR__.'/controllers/condidate/competence.php');

$router->get('/condidate/formation', __DIR__.'/controllers/condidate/formation.php');
$router->delete('/condidate/formation/:id', __DIR__.'/controllers/condidate/formation.php');
$router->put('/condidate/formation/:id', __DIR__.'/controllers/condidate/formation.php');
$router->post('/condidate/formation', __DIR__.'/controllers/condidate/formation.php');

$router->get('/condidate/experience', __DIR__.'/controllers/condidate/experience.php');
$router->delete('/condidate/experience/:id', __DIR__.'/controllers/condidate/experience.php');
$router->put('/condidate/experience/:id', __DIR__.'/controllers/condidate/experience.php');
$router->post('/condidate/experience', __DIR__.'/controllers//condidate/experience.php');

$router->get('/condidate/offerDetails/:id', __DIR__.'/controllers/condidate/offerDetails.php');
$router->post('/condidate/offerDetails/:id', __DIR__.'/controllers/condidate/offerDetails.php');
$router->get('/condidate/CV', __DIR__.'/controllers/condidate/cv.php');
$router->post('/condidate/CV', __DIR__.'/controllers/condidate/cv.php');

$router->get('/condidate/profile/:id', __DIR__.'/controllers/condidate/profile.php');
$router->post('/condidate/profile/:id', __DIR__.'/controllers/condidate/profile.php');

$router->get('/condidate/jobs', __DIR__.'/controllers/condidate/jobs.php');
?>