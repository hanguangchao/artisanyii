namespace php HelloThrift
 
service HelloService {
    string sayHello(1:string username)
}
