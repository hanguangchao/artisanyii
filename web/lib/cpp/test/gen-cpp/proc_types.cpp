/**
 * Autogenerated by Thrift Compiler (1.0.0-dev)
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */
#include "proc_types.h"

#include <algorithm>
#include <ostream>

#include <thrift/TToString.h>

namespace apache { namespace thrift { namespace test {


MyError::~MyError() throw() {
}


void MyError::__set_message(const std::string& val) {
  this->message = val;
}
std::ostream& operator<<(std::ostream& out, const MyError& obj)
{
  obj.printTo(out);
  return out;
}


void swap(MyError &a, MyError &b) {
  using ::std::swap;
  swap(a.message, b.message);
  swap(a.__isset, b.__isset);
}

MyError::MyError(const MyError& other0) : TException() {
  message = other0.message;
  __isset = other0.__isset;
}
MyError& MyError::operator=(const MyError& other1) {
  message = other1.message;
  __isset = other1.__isset;
  return *this;
}
void MyError::printTo(std::ostream& out) const {
  using ::apache::thrift::to_string;
  out << "MyError(";
  out << "message=" << to_string(message);
  out << ")";
}

const char* MyError::what() const throw() {
  try {
    std::stringstream ss;
    ss << "TException - service has thrown: " << *this;
    this->thriftTExceptionMessageHolder_ = ss.str();
    return this->thriftTExceptionMessageHolder_.c_str();
  } catch (const std::exception&) {
    return "TException - service has thrown: MyError";
  }
}

}}} // namespace
