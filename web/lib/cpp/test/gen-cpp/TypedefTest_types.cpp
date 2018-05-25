/**
 * Autogenerated by Thrift Compiler (1.0.0-dev)
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */
#include "TypedefTest_types.h"

#include <algorithm>
#include <ostream>

#include <thrift/TToString.h>

namespace thrift { namespace test {


TypedefTestStruct::~TypedefTestStruct() throw() {
}


void TypedefTestStruct::__set_field_MyInt32(const MyInt32 val) {
  this->field_MyInt32 = val;
}

void TypedefTestStruct::__set_field_MyString(const MyString& val) {
  this->field_MyString = val;
}

void TypedefTestStruct::__set_field_Int32(const int32_t val) {
  this->field_Int32 = val;
}

void TypedefTestStruct::__set_field_String(const std::string& val) {
  this->field_String = val;
}
std::ostream& operator<<(std::ostream& out, const TypedefTestStruct& obj)
{
  obj.printTo(out);
  return out;
}


uint32_t TypedefTestStruct::read(::apache::thrift::protocol::TProtocol* iprot) {

  ::apache::thrift::protocol::TInputRecursionTracker tracker(*iprot);
  uint32_t xfer = 0;
  std::string fname;
  ::apache::thrift::protocol::TType ftype;
  int16_t fid;

  xfer += iprot->readStructBegin(fname);

  using ::apache::thrift::protocol::TProtocolException;


  while (true)
  {
    xfer += iprot->readFieldBegin(fname, ftype, fid);
    if (ftype == ::apache::thrift::protocol::T_STOP) {
      break;
    }
    switch (fid)
    {
      case 1:
        if (ftype == ::apache::thrift::protocol::T_I32) {
          xfer += iprot->readI32(this->field_MyInt32);
          this->__isset.field_MyInt32 = true;
        } else {
          xfer += iprot->skip(ftype);
        }
        break;
      case 2:
        if (ftype == ::apache::thrift::protocol::T_STRING) {
          xfer += iprot->readString(this->field_MyString);
          this->__isset.field_MyString = true;
        } else {
          xfer += iprot->skip(ftype);
        }
        break;
      case 3:
        if (ftype == ::apache::thrift::protocol::T_I32) {
          xfer += iprot->readI32(this->field_Int32);
          this->__isset.field_Int32 = true;
        } else {
          xfer += iprot->skip(ftype);
        }
        break;
      case 4:
        if (ftype == ::apache::thrift::protocol::T_STRING) {
          xfer += iprot->readString(this->field_String);
          this->__isset.field_String = true;
        } else {
          xfer += iprot->skip(ftype);
        }
        break;
      default:
        xfer += iprot->skip(ftype);
        break;
    }
    xfer += iprot->readFieldEnd();
  }

  xfer += iprot->readStructEnd();

  return xfer;
}

uint32_t TypedefTestStruct::write(::apache::thrift::protocol::TProtocol* oprot) const {
  uint32_t xfer = 0;
  ::apache::thrift::protocol::TOutputRecursionTracker tracker(*oprot);
  xfer += oprot->writeStructBegin("TypedefTestStruct");

  xfer += oprot->writeFieldBegin("field_MyInt32", ::apache::thrift::protocol::T_I32, 1);
  xfer += oprot->writeI32(this->field_MyInt32);
  xfer += oprot->writeFieldEnd();

  xfer += oprot->writeFieldBegin("field_MyString", ::apache::thrift::protocol::T_STRING, 2);
  xfer += oprot->writeString(this->field_MyString);
  xfer += oprot->writeFieldEnd();

  xfer += oprot->writeFieldBegin("field_Int32", ::apache::thrift::protocol::T_I32, 3);
  xfer += oprot->writeI32(this->field_Int32);
  xfer += oprot->writeFieldEnd();

  xfer += oprot->writeFieldBegin("field_String", ::apache::thrift::protocol::T_STRING, 4);
  xfer += oprot->writeString(this->field_String);
  xfer += oprot->writeFieldEnd();

  xfer += oprot->writeFieldStop();
  xfer += oprot->writeStructEnd();
  return xfer;
}

void swap(TypedefTestStruct &a, TypedefTestStruct &b) {
  using ::std::swap;
  swap(a.field_MyInt32, b.field_MyInt32);
  swap(a.field_MyString, b.field_MyString);
  swap(a.field_Int32, b.field_Int32);
  swap(a.field_String, b.field_String);
  swap(a.__isset, b.__isset);
}

TypedefTestStruct::TypedefTestStruct(const TypedefTestStruct& other0) {
  field_MyInt32 = other0.field_MyInt32;
  field_MyString = other0.field_MyString;
  field_Int32 = other0.field_Int32;
  field_String = other0.field_String;
  __isset = other0.__isset;
}
TypedefTestStruct& TypedefTestStruct::operator=(const TypedefTestStruct& other1) {
  field_MyInt32 = other1.field_MyInt32;
  field_MyString = other1.field_MyString;
  field_Int32 = other1.field_Int32;
  field_String = other1.field_String;
  __isset = other1.__isset;
  return *this;
}
void TypedefTestStruct::printTo(std::ostream& out) const {
  using ::apache::thrift::to_string;
  out << "TypedefTestStruct(";
  out << "field_MyInt32=" << to_string(field_MyInt32);
  out << ", " << "field_MyString=" << to_string(field_MyString);
  out << ", " << "field_Int32=" << to_string(field_Int32);
  out << ", " << "field_String=" << to_string(field_String);
  out << ")";
}

}} // namespace
