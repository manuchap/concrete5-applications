## Database HTTPie
http POST https://api.alwaysdata.com/v1/database/ permissions:='{"111990":"FULL"}' type=MYSQL name=myconcretelab_toto account=myconcretelab encoding=utf8 -a 7375bf1d975c4851951523c3babed476:

## Database CURL
curl --user '7375bf1d975c4851951523c3babed476 account=myconcretelab:' -d '{"type":"apache_standard","name":"myconcretelab_curl","path":"/www/curl","addresses":["http://curl.myconcretelab.com"]}' https://api.alwaysdata.com/v1/site/

## Site
