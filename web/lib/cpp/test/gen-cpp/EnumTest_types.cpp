/**
 * Autogenerated by Thrift Compiler (1.0.0-dev)
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */
#include "EnumTest_types.h"

#include <algorithm>
#include <ostream>

#include <thrift/TToString.h>



int _kMyEnum1Values[] = {
  MyEnum1::ME1_0,
  MyEnum1::ME1_1,
  MyEnum1::ME1_2,
  MyEnum1::ME1_3,
  MyEnum1::ME1_5,
  MyEnum1::ME1_6
};
const char* _kMyEnum1Names[] = {
  "ME1_0",
  "ME1_1",
  "ME1_2",
  "ME1_3",
  "ME1_5",
  "ME1_6"
};
const std::map<int, const char*> _MyEnum1_VALUES_TO_NAMES(::apache::thrift::TEnumIterator(6, _kMyEnum1Values, _kMyEnum1Names), ::apache::thrift::TEnumIterator(-1, NULL, NULL));

std::ostream& operator<<(std::ostream& out, const MyEnum1::type& val) {
  std::map<int, const char*>::const_iterator it = _MyEnum1_VALUES_TO_NAMES.find(val);
  if (it != _MyEnum1_VALUES_TO_NAMES.end()) {
    out << it->second;
  } else {
    out << static_cast<int>(val);
  }
  return out;
}

int _kMyEnum2Values[] = {
  MyEnum2::ME2_0,
  MyEnum2::ME2_1,
  MyEnum2::ME2_2
};
const char* _kMyEnum2Names[] = {
  "ME2_0",
  "ME2_1",
  "ME2_2"
};
const std::map<int, const char*> _MyEnum2_VALUES_TO_NAMES(::apache::thrift::TEnumIterator(3, _kMyEnum2Values, _kMyEnum2Names), ::apache::thrift::TEnumIterator(-1, NULL, NULL));

std::ostream& operator<<(std::ostream& out, const MyEnum2::type& val) {
  std::map<int, const char*>::const_iterator it = _MyEnum2_VALUES_TO_NAMES.find(val);
  if (it != _MyEnum2_VALUES_TO_NAMES.end()) {
    out << it->second;
  } else {
    out << static_cast<int>(val);
  }
  return out;
}

int _kMyEnum2_againValues[] = {
  MyEnum2_again::ME0_1,
  MyEnum2_again::ME1_1,
  MyEnum2_again::ME2_1,
  MyEnum2_again::ME3_1
};
const char* _kMyEnum2_againNames[] = {
  "ME0_1",
  "ME1_1",
  "ME2_1",
  "ME3_1"
};
const std::map<int, const char*> _MyEnum2_again_VALUES_TO_NAMES(::apache::thrift::TEnumIterator(4, _kMyEnum2_againValues, _kMyEnum2_againNames), ::apache::thrift::TEnumIterator(-1, NULL, NULL));

std::ostream& operator<<(std::ostream& out, const MyEnum2_again::type& val) {
  std::map<int, const char*>::const_iterator it = _MyEnum2_again_VALUES_TO_NAMES.find(val);
  if (it != _MyEnum2_again_VALUES_TO_NAMES.end()) {
    out << it->second;
  } else {
    out << static_cast<int>(val);
  }
  return out;
}

int _kMyEnum3Values[] = {
  MyEnum3::ME3_0,
  MyEnum3::ME3_1,
  MyEnum3::ME3_N2,
  MyEnum3::ME3_N1,
  MyEnum3::ME3_D0,
  MyEnum3::ME3_D1,
  MyEnum3::ME3_9,
  MyEnum3::ME3_10
};
const char* _kMyEnum3Names[] = {
  "ME3_0",
  "ME3_1",
  "ME3_N2",
  "ME3_N1",
  "ME3_D0",
  "ME3_D1",
  "ME3_9",
  "ME3_10"
};
const std::map<int, const char*> _MyEnum3_VALUES_TO_NAMES(::apache::thrift::TEnumIterator(8, _kMyEnum3Values, _kMyEnum3Names), ::apache::thrift::TEnumIterator(-1, NULL, NULL));

std::ostream& operator<<(std::ostream& out, const MyEnum3::type& val) {
  std::map<int, const char*>::const_iterator it = _MyEnum3_VALUES_TO_NAMES.find(val);
  if (it != _MyEnum3_VALUES_TO_NAMES.end()) {
    out << it->second;
  } else {
    out << static_cast<int>(val);
  }
  return out;
}

int _kMyEnum4Values[] = {
  MyEnum4::ME4_A,
  MyEnum4::ME4_B,
  MyEnum4::ME4_C
};
const char* _kMyEnum4Names[] = {
  "ME4_A",
  "ME4_B",
  "ME4_C"
};
const std::map<int, const char*> _MyEnum4_VALUES_TO_NAMES(::apache::thrift::TEnumIterator(3, _kMyEnum4Values, _kMyEnum4Names), ::apache::thrift::TEnumIterator(-1, NULL, NULL));

std::ostream& operator<<(std::ostream& out, const MyEnum4::type& val) {
  std::map<int, const char*>::const_iterator it = _MyEnum4_VALUES_TO_NAMES.find(val);
  if (it != _MyEnum4_VALUES_TO_NAMES.end()) {
    out << it->second;
  } else {
    out << static_cast<int>(val);
  }
  return out;
}

int _kMyEnum5Values[] = {
  MyEnum5::e1,
  MyEnum5::e2
};
const char* _kMyEnum5Names[] = {
  "e1",
  "e2"
};
const std::map<int, const char*> _MyEnum5_VALUES_TO_NAMES(::apache::thrift::TEnumIterator(2, _kMyEnum5Values, _kMyEnum5Names), ::apache::thrift::TEnumIterator(-1, NULL, NULL));

std::ostream& operator<<(std::ostream& out, const MyEnum5::type& val) {
  std::map<int, const char*>::const_iterator it = _MyEnum5_VALUES_TO_NAMES.find(val);
  if (it != _MyEnum5_VALUES_TO_NAMES.end()) {
    out << it->second;
  } else {
    out << static_cast<int>(val);
  }
  return out;
}

int _kMyEnumWithCustomOstreamValues[] = {
  MyEnumWithCustomOstream::custom1,
  MyEnumWithCustomOstream::CustoM2
};
const char* _kMyEnumWithCustomOstreamNames[] = {
  "custom1",
  "CustoM2"
};
const std::map<int, const char*> _MyEnumWithCustomOstream_VALUES_TO_NAMES(::apache::thrift::TEnumIterator(2, _kMyEnumWithCustomOstreamValues, _kMyEnumWithCustomOstreamNames), ::apache::thrift::TEnumIterator(-1, NULL, NULL));


MyStruct::~MyStruct() throw() {
}


void MyStruct::__set_me2_2(const MyEnum2::type val) {
  this->me2_2 = val;
}

void MyStruct::__set_me3_n2(const MyEnum3::type val) {
  this->me3_n2 = val;
}

void MyStruct::__set_me3_d1(const MyEnum3::type val) {
  this->me3_d1 = val;
}
std::ostream& operator<<(std::ostream& out, const MyStruct& obj)
{
  obj.printTo(out);
  return out;
}


uint32_t MyStruct::read(::apache::thrift::protocol::TProtocol* iprot) {

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
          int32_t ecast0;
          xfer += iprot->readI32(ecast0);
          this->me2_2 = (MyEnum2::type)ecast0;
          this->__isset.me2_2 = true;
        } else {
          xfer += iprot->skip(ftype);
        }
        break;
      case 2:
        if (ftype == ::apache::thrift::protocol::T_I32) {
          int32_t ecast1;
          xfer += iprot->readI32(ecast1);
          this->me3_n2 = (MyEnum3::type)ecast1;
          this->__isset.me3_n2 = true;
        } else {
          xfer += iprot->skip(ftype);
        }
        break;
      case 3:
        if (ftype == ::apache::thrift::protocol::T_I32) {
          int32_t ecast2;
          xfer += iprot->readI32(ecast2);
          this->me3_d1 = (MyEnum3::type)ecast2;
          this->__isset.me3_d1 = true;
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

uint32_t MyStruct::write(::apache::thrift::protocol::TProtocol* oprot) const {
  uint32_t xfer = 0;
  ::apache::thrift::protocol::TOutputRecursionTracker tracker(*oprot);
  xfer += oprot->writeStructBegin("MyStruct");

  xfer += oprot->writeFieldBegin("me2_2", ::apache::thrift::protocol::T_I32, 1);
  xfer += oprot->writeI32((int32_t)this->me2_2);
  xfer += oprot->writeFieldEnd();

  xfer += oprot->writeFieldBegin("me3_n2", ::apache::thrift::protocol::T_I32, 2);
  xfer += oprot->writeI32((int32_t)this->me3_n2);
  xfer += oprot->writeFieldEnd();

  xfer += oprot->writeFieldBegin("me3_d1", ::apache::thrift::protocol::T_I32, 3);
  xfer += oprot->writeI32((int32_t)this->me3_d1);
  xfer += oprot->writeFieldEnd();

  xfer += oprot->writeFieldStop();
  xfer += oprot->writeStructEnd();
  return xfer;
}

void swap(MyStruct &a, MyStruct &b) {
  using ::std::swap;
  swap(a.me2_2, b.me2_2);
  swap(a.me3_n2, b.me3_n2);
  swap(a.me3_d1, b.me3_d1);
  swap(a.__isset, b.__isset);
}

MyStruct::MyStruct(const MyStruct& other3) {
  me2_2 = other3.me2_2;
  me3_n2 = other3.me3_n2;
  me3_d1 = other3.me3_d1;
  __isset = other3.__isset;
}
MyStruct& MyStruct::operator=(const MyStruct& other4) {
  me2_2 = other4.me2_2;
  me3_n2 = other4.me3_n2;
  me3_d1 = other4.me3_d1;
  __isset = other4.__isset;
  return *this;
}
void MyStruct::printTo(std::ostream& out) const {
  using ::apache::thrift::to_string;
  out << "MyStruct(";
  out << "me2_2=" << to_string(me2_2);
  out << ", " << "me3_n2=" << to_string(me3_n2);
  out << ", " << "me3_d1=" << to_string(me3_d1);
  out << ")";
}


EnumTestStruct::~EnumTestStruct() throw() {
}


void EnumTestStruct::__set_a_enum(const MyEnum3::type val) {
  this->a_enum = val;
}

void EnumTestStruct::__set_enum_list(const std::vector<MyEnum3::type> & val) {
  this->enum_list = val;
}

void EnumTestStruct::__set_enum_set(const std::set<MyEnum3::type> & val) {
  this->enum_set = val;
}

void EnumTestStruct::__set_enum_enum_map(const std::map<MyEnum3::type, MyEnum3::type> & val) {
  this->enum_enum_map = val;
}

void EnumTestStruct::__set_list_enum_map(const std::map<std::vector<MyEnum3::type> , MyEnum3::type> & val) {
  this->list_enum_map = val;
}

void EnumTestStruct::__set_set_enum_map(const std::map<std::set<MyEnum3::type> , MyEnum3::type> & val) {
  this->set_enum_map = val;
}

void EnumTestStruct::__set_map_enum_map(const std::map<std::map<MyEnum3::type, MyEnum3::type> , MyEnum3::type> & val) {
  this->map_enum_map = val;
}

void EnumTestStruct::__set_enum_map_map(const std::map<MyEnum3::type, std::map<MyEnum3::type, MyEnum3::type> > & val) {
  this->enum_map_map = val;
}

void EnumTestStruct::__set_enum_set_map(const std::map<MyEnum3::type, std::set<MyEnum3::type> > & val) {
  this->enum_set_map = val;
}

void EnumTestStruct::__set_enum_list_map(const std::map<MyEnum3::type, std::vector<MyEnum3::type> > & val) {
  this->enum_list_map = val;
}
std::ostream& operator<<(std::ostream& out, const EnumTestStruct& obj)
{
  obj.printTo(out);
  return out;
}


uint32_t EnumTestStruct::read(::apache::thrift::protocol::TProtocol* iprot) {

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
          int32_t ecast5;
          xfer += iprot->readI32(ecast5);
          this->a_enum = (MyEnum3::type)ecast5;
          this->__isset.a_enum = true;
        } else {
          xfer += iprot->skip(ftype);
        }
        break;
      case 2:
        if (ftype == ::apache::thrift::protocol::T_LIST) {
          {
            this->enum_list.clear();
            uint32_t _size6;
            ::apache::thrift::protocol::TType _etype9;
            xfer += iprot->readListBegin(_etype9, _size6);
            this->enum_list.resize(_size6);
            uint32_t _i10;
            for (_i10 = 0; _i10 < _size6; ++_i10)
            {
              int32_t ecast11;
              xfer += iprot->readI32(ecast11);
              this->enum_list[_i10] = (MyEnum3::type)ecast11;
            }
            xfer += iprot->readListEnd();
          }
          this->__isset.enum_list = true;
        } else {
          xfer += iprot->skip(ftype);
        }
        break;
      case 3:
        if (ftype == ::apache::thrift::protocol::T_SET) {
          {
            this->enum_set.clear();
            uint32_t _size12;
            ::apache::thrift::protocol::TType _etype15;
            xfer += iprot->readSetBegin(_etype15, _size12);
            uint32_t _i16;
            for (_i16 = 0; _i16 < _size12; ++_i16)
            {
              MyEnum3::type _elem17;
              int32_t ecast18;
              xfer += iprot->readI32(ecast18);
              _elem17 = (MyEnum3::type)ecast18;
              this->enum_set.insert(_elem17);
            }
            xfer += iprot->readSetEnd();
          }
          this->__isset.enum_set = true;
        } else {
          xfer += iprot->skip(ftype);
        }
        break;
      case 4:
        if (ftype == ::apache::thrift::protocol::T_MAP) {
          {
            this->enum_enum_map.clear();
            uint32_t _size19;
            ::apache::thrift::protocol::TType _ktype20;
            ::apache::thrift::protocol::TType _vtype21;
            xfer += iprot->readMapBegin(_ktype20, _vtype21, _size19);
            uint32_t _i23;
            for (_i23 = 0; _i23 < _size19; ++_i23)
            {
              MyEnum3::type _key24;
              int32_t ecast26;
              xfer += iprot->readI32(ecast26);
              _key24 = (MyEnum3::type)ecast26;
              MyEnum3::type& _val25 = this->enum_enum_map[_key24];
              int32_t ecast27;
              xfer += iprot->readI32(ecast27);
              _val25 = (MyEnum3::type)ecast27;
            }
            xfer += iprot->readMapEnd();
          }
          this->__isset.enum_enum_map = true;
        } else {
          xfer += iprot->skip(ftype);
        }
        break;
      case 44:
        if (ftype == ::apache::thrift::protocol::T_MAP) {
          {
            this->list_enum_map.clear();
            uint32_t _size28;
            ::apache::thrift::protocol::TType _ktype29;
            ::apache::thrift::protocol::TType _vtype30;
            xfer += iprot->readMapBegin(_ktype29, _vtype30, _size28);
            uint32_t _i32;
            for (_i32 = 0; _i32 < _size28; ++_i32)
            {
              std::vector<MyEnum3::type>  _key33;
              {
                _key33.clear();
                uint32_t _size35;
                ::apache::thrift::protocol::TType _etype38;
                xfer += iprot->readListBegin(_etype38, _size35);
                _key33.resize(_size35);
                uint32_t _i39;
                for (_i39 = 0; _i39 < _size35; ++_i39)
                {
                  int32_t ecast40;
                  xfer += iprot->readI32(ecast40);
                  _key33[_i39] = (MyEnum3::type)ecast40;
                }
                xfer += iprot->readListEnd();
              }
              MyEnum3::type& _val34 = this->list_enum_map[_key33];
              int32_t ecast41;
              xfer += iprot->readI32(ecast41);
              _val34 = (MyEnum3::type)ecast41;
            }
            xfer += iprot->readMapEnd();
          }
          this->__isset.list_enum_map = true;
        } else {
          xfer += iprot->skip(ftype);
        }
        break;
      case 45:
        if (ftype == ::apache::thrift::protocol::T_MAP) {
          {
            this->set_enum_map.clear();
            uint32_t _size42;
            ::apache::thrift::protocol::TType _ktype43;
            ::apache::thrift::protocol::TType _vtype44;
            xfer += iprot->readMapBegin(_ktype43, _vtype44, _size42);
            uint32_t _i46;
            for (_i46 = 0; _i46 < _size42; ++_i46)
            {
              std::set<MyEnum3::type>  _key47;
              {
                _key47.clear();
                uint32_t _size49;
                ::apache::thrift::protocol::TType _etype52;
                xfer += iprot->readSetBegin(_etype52, _size49);
                uint32_t _i53;
                for (_i53 = 0; _i53 < _size49; ++_i53)
                {
                  MyEnum3::type _elem54;
                  int32_t ecast55;
                  xfer += iprot->readI32(ecast55);
                  _elem54 = (MyEnum3::type)ecast55;
                  _key47.insert(_elem54);
                }
                xfer += iprot->readSetEnd();
              }
              MyEnum3::type& _val48 = this->set_enum_map[_key47];
              int32_t ecast56;
              xfer += iprot->readI32(ecast56);
              _val48 = (MyEnum3::type)ecast56;
            }
            xfer += iprot->readMapEnd();
          }
          this->__isset.set_enum_map = true;
        } else {
          xfer += iprot->skip(ftype);
        }
        break;
      case 46:
        if (ftype == ::apache::thrift::protocol::T_MAP) {
          {
            this->map_enum_map.clear();
            uint32_t _size57;
            ::apache::thrift::protocol::TType _ktype58;
            ::apache::thrift::protocol::TType _vtype59;
            xfer += iprot->readMapBegin(_ktype58, _vtype59, _size57);
            uint32_t _i61;
            for (_i61 = 0; _i61 < _size57; ++_i61)
            {
              std::map<MyEnum3::type, MyEnum3::type>  _key62;
              {
                _key62.clear();
                uint32_t _size64;
                ::apache::thrift::protocol::TType _ktype65;
                ::apache::thrift::protocol::TType _vtype66;
                xfer += iprot->readMapBegin(_ktype65, _vtype66, _size64);
                uint32_t _i68;
                for (_i68 = 0; _i68 < _size64; ++_i68)
                {
                  MyEnum3::type _key69;
                  int32_t ecast71;
                  xfer += iprot->readI32(ecast71);
                  _key69 = (MyEnum3::type)ecast71;
                  MyEnum3::type& _val70 = _key62[_key69];
                  int32_t ecast72;
                  xfer += iprot->readI32(ecast72);
                  _val70 = (MyEnum3::type)ecast72;
                }
                xfer += iprot->readMapEnd();
              }
              MyEnum3::type& _val63 = this->map_enum_map[_key62];
              int32_t ecast73;
              xfer += iprot->readI32(ecast73);
              _val63 = (MyEnum3::type)ecast73;
            }
            xfer += iprot->readMapEnd();
          }
          this->__isset.map_enum_map = true;
        } else {
          xfer += iprot->skip(ftype);
        }
        break;
      case 47:
        if (ftype == ::apache::thrift::protocol::T_MAP) {
          {
            this->enum_map_map.clear();
            uint32_t _size74;
            ::apache::thrift::protocol::TType _ktype75;
            ::apache::thrift::protocol::TType _vtype76;
            xfer += iprot->readMapBegin(_ktype75, _vtype76, _size74);
            uint32_t _i78;
            for (_i78 = 0; _i78 < _size74; ++_i78)
            {
              MyEnum3::type _key79;
              int32_t ecast81;
              xfer += iprot->readI32(ecast81);
              _key79 = (MyEnum3::type)ecast81;
              std::map<MyEnum3::type, MyEnum3::type> & _val80 = this->enum_map_map[_key79];
              {
                _val80.clear();
                uint32_t _size82;
                ::apache::thrift::protocol::TType _ktype83;
                ::apache::thrift::protocol::TType _vtype84;
                xfer += iprot->readMapBegin(_ktype83, _vtype84, _size82);
                uint32_t _i86;
                for (_i86 = 0; _i86 < _size82; ++_i86)
                {
                  MyEnum3::type _key87;
                  int32_t ecast89;
                  xfer += iprot->readI32(ecast89);
                  _key87 = (MyEnum3::type)ecast89;
                  MyEnum3::type& _val88 = _val80[_key87];
                  int32_t ecast90;
                  xfer += iprot->readI32(ecast90);
                  _val88 = (MyEnum3::type)ecast90;
                }
                xfer += iprot->readMapEnd();
              }
            }
            xfer += iprot->readMapEnd();
          }
          this->__isset.enum_map_map = true;
        } else {
          xfer += iprot->skip(ftype);
        }
        break;
      case 48:
        if (ftype == ::apache::thrift::protocol::T_MAP) {
          {
            this->enum_set_map.clear();
            uint32_t _size91;
            ::apache::thrift::protocol::TType _ktype92;
            ::apache::thrift::protocol::TType _vtype93;
            xfer += iprot->readMapBegin(_ktype92, _vtype93, _size91);
            uint32_t _i95;
            for (_i95 = 0; _i95 < _size91; ++_i95)
            {
              MyEnum3::type _key96;
              int32_t ecast98;
              xfer += iprot->readI32(ecast98);
              _key96 = (MyEnum3::type)ecast98;
              std::set<MyEnum3::type> & _val97 = this->enum_set_map[_key96];
              {
                _val97.clear();
                uint32_t _size99;
                ::apache::thrift::protocol::TType _etype102;
                xfer += iprot->readSetBegin(_etype102, _size99);
                uint32_t _i103;
                for (_i103 = 0; _i103 < _size99; ++_i103)
                {
                  MyEnum3::type _elem104;
                  int32_t ecast105;
                  xfer += iprot->readI32(ecast105);
                  _elem104 = (MyEnum3::type)ecast105;
                  _val97.insert(_elem104);
                }
                xfer += iprot->readSetEnd();
              }
            }
            xfer += iprot->readMapEnd();
          }
          this->__isset.enum_set_map = true;
        } else {
          xfer += iprot->skip(ftype);
        }
        break;
      case 49:
        if (ftype == ::apache::thrift::protocol::T_MAP) {
          {
            this->enum_list_map.clear();
            uint32_t _size106;
            ::apache::thrift::protocol::TType _ktype107;
            ::apache::thrift::protocol::TType _vtype108;
            xfer += iprot->readMapBegin(_ktype107, _vtype108, _size106);
            uint32_t _i110;
            for (_i110 = 0; _i110 < _size106; ++_i110)
            {
              MyEnum3::type _key111;
              int32_t ecast113;
              xfer += iprot->readI32(ecast113);
              _key111 = (MyEnum3::type)ecast113;
              std::vector<MyEnum3::type> & _val112 = this->enum_list_map[_key111];
              {
                _val112.clear();
                uint32_t _size114;
                ::apache::thrift::protocol::TType _etype117;
                xfer += iprot->readListBegin(_etype117, _size114);
                _val112.resize(_size114);
                uint32_t _i118;
                for (_i118 = 0; _i118 < _size114; ++_i118)
                {
                  int32_t ecast119;
                  xfer += iprot->readI32(ecast119);
                  _val112[_i118] = (MyEnum3::type)ecast119;
                }
                xfer += iprot->readListEnd();
              }
            }
            xfer += iprot->readMapEnd();
          }
          this->__isset.enum_list_map = true;
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

uint32_t EnumTestStruct::write(::apache::thrift::protocol::TProtocol* oprot) const {
  uint32_t xfer = 0;
  ::apache::thrift::protocol::TOutputRecursionTracker tracker(*oprot);
  xfer += oprot->writeStructBegin("EnumTestStruct");

  xfer += oprot->writeFieldBegin("a_enum", ::apache::thrift::protocol::T_I32, 1);
  xfer += oprot->writeI32((int32_t)this->a_enum);
  xfer += oprot->writeFieldEnd();

  xfer += oprot->writeFieldBegin("enum_list", ::apache::thrift::protocol::T_LIST, 2);
  {
    xfer += oprot->writeListBegin(::apache::thrift::protocol::T_I32, static_cast<uint32_t>(this->enum_list.size()));
    std::vector<MyEnum3::type> ::const_iterator _iter120;
    for (_iter120 = this->enum_list.begin(); _iter120 != this->enum_list.end(); ++_iter120)
    {
      xfer += oprot->writeI32((int32_t)(*_iter120));
    }
    xfer += oprot->writeListEnd();
  }
  xfer += oprot->writeFieldEnd();

  xfer += oprot->writeFieldBegin("enum_set", ::apache::thrift::protocol::T_SET, 3);
  {
    xfer += oprot->writeSetBegin(::apache::thrift::protocol::T_I32, static_cast<uint32_t>(this->enum_set.size()));
    std::set<MyEnum3::type> ::const_iterator _iter121;
    for (_iter121 = this->enum_set.begin(); _iter121 != this->enum_set.end(); ++_iter121)
    {
      xfer += oprot->writeI32((int32_t)(*_iter121));
    }
    xfer += oprot->writeSetEnd();
  }
  xfer += oprot->writeFieldEnd();

  xfer += oprot->writeFieldBegin("enum_enum_map", ::apache::thrift::protocol::T_MAP, 4);
  {
    xfer += oprot->writeMapBegin(::apache::thrift::protocol::T_I32, ::apache::thrift::protocol::T_I32, static_cast<uint32_t>(this->enum_enum_map.size()));
    std::map<MyEnum3::type, MyEnum3::type> ::const_iterator _iter122;
    for (_iter122 = this->enum_enum_map.begin(); _iter122 != this->enum_enum_map.end(); ++_iter122)
    {
      xfer += oprot->writeI32((int32_t)_iter122->first);
      xfer += oprot->writeI32((int32_t)_iter122->second);
    }
    xfer += oprot->writeMapEnd();
  }
  xfer += oprot->writeFieldEnd();

  xfer += oprot->writeFieldBegin("list_enum_map", ::apache::thrift::protocol::T_MAP, 44);
  {
    xfer += oprot->writeMapBegin(::apache::thrift::protocol::T_LIST, ::apache::thrift::protocol::T_I32, static_cast<uint32_t>(this->list_enum_map.size()));
    std::map<std::vector<MyEnum3::type> , MyEnum3::type> ::const_iterator _iter123;
    for (_iter123 = this->list_enum_map.begin(); _iter123 != this->list_enum_map.end(); ++_iter123)
    {
      {
        xfer += oprot->writeListBegin(::apache::thrift::protocol::T_I32, static_cast<uint32_t>(_iter123->first.size()));
        std::vector<MyEnum3::type> ::const_iterator _iter124;
        for (_iter124 = _iter123->first.begin(); _iter124 != _iter123->first.end(); ++_iter124)
        {
          xfer += oprot->writeI32((int32_t)(*_iter124));
        }
        xfer += oprot->writeListEnd();
      }
      xfer += oprot->writeI32((int32_t)_iter123->second);
    }
    xfer += oprot->writeMapEnd();
  }
  xfer += oprot->writeFieldEnd();

  xfer += oprot->writeFieldBegin("set_enum_map", ::apache::thrift::protocol::T_MAP, 45);
  {
    xfer += oprot->writeMapBegin(::apache::thrift::protocol::T_SET, ::apache::thrift::protocol::T_I32, static_cast<uint32_t>(this->set_enum_map.size()));
    std::map<std::set<MyEnum3::type> , MyEnum3::type> ::const_iterator _iter125;
    for (_iter125 = this->set_enum_map.begin(); _iter125 != this->set_enum_map.end(); ++_iter125)
    {
      {
        xfer += oprot->writeSetBegin(::apache::thrift::protocol::T_I32, static_cast<uint32_t>(_iter125->first.size()));
        std::set<MyEnum3::type> ::const_iterator _iter126;
        for (_iter126 = _iter125->first.begin(); _iter126 != _iter125->first.end(); ++_iter126)
        {
          xfer += oprot->writeI32((int32_t)(*_iter126));
        }
        xfer += oprot->writeSetEnd();
      }
      xfer += oprot->writeI32((int32_t)_iter125->second);
    }
    xfer += oprot->writeMapEnd();
  }
  xfer += oprot->writeFieldEnd();

  xfer += oprot->writeFieldBegin("map_enum_map", ::apache::thrift::protocol::T_MAP, 46);
  {
    xfer += oprot->writeMapBegin(::apache::thrift::protocol::T_MAP, ::apache::thrift::protocol::T_I32, static_cast<uint32_t>(this->map_enum_map.size()));
    std::map<std::map<MyEnum3::type, MyEnum3::type> , MyEnum3::type> ::const_iterator _iter127;
    for (_iter127 = this->map_enum_map.begin(); _iter127 != this->map_enum_map.end(); ++_iter127)
    {
      {
        xfer += oprot->writeMapBegin(::apache::thrift::protocol::T_I32, ::apache::thrift::protocol::T_I32, static_cast<uint32_t>(_iter127->first.size()));
        std::map<MyEnum3::type, MyEnum3::type> ::const_iterator _iter128;
        for (_iter128 = _iter127->first.begin(); _iter128 != _iter127->first.end(); ++_iter128)
        {
          xfer += oprot->writeI32((int32_t)_iter128->first);
          xfer += oprot->writeI32((int32_t)_iter128->second);
        }
        xfer += oprot->writeMapEnd();
      }
      xfer += oprot->writeI32((int32_t)_iter127->second);
    }
    xfer += oprot->writeMapEnd();
  }
  xfer += oprot->writeFieldEnd();

  xfer += oprot->writeFieldBegin("enum_map_map", ::apache::thrift::protocol::T_MAP, 47);
  {
    xfer += oprot->writeMapBegin(::apache::thrift::protocol::T_I32, ::apache::thrift::protocol::T_MAP, static_cast<uint32_t>(this->enum_map_map.size()));
    std::map<MyEnum3::type, std::map<MyEnum3::type, MyEnum3::type> > ::const_iterator _iter129;
    for (_iter129 = this->enum_map_map.begin(); _iter129 != this->enum_map_map.end(); ++_iter129)
    {
      xfer += oprot->writeI32((int32_t)_iter129->first);
      {
        xfer += oprot->writeMapBegin(::apache::thrift::protocol::T_I32, ::apache::thrift::protocol::T_I32, static_cast<uint32_t>(_iter129->second.size()));
        std::map<MyEnum3::type, MyEnum3::type> ::const_iterator _iter130;
        for (_iter130 = _iter129->second.begin(); _iter130 != _iter129->second.end(); ++_iter130)
        {
          xfer += oprot->writeI32((int32_t)_iter130->first);
          xfer += oprot->writeI32((int32_t)_iter130->second);
        }
        xfer += oprot->writeMapEnd();
      }
    }
    xfer += oprot->writeMapEnd();
  }
  xfer += oprot->writeFieldEnd();

  xfer += oprot->writeFieldBegin("enum_set_map", ::apache::thrift::protocol::T_MAP, 48);
  {
    xfer += oprot->writeMapBegin(::apache::thrift::protocol::T_I32, ::apache::thrift::protocol::T_SET, static_cast<uint32_t>(this->enum_set_map.size()));
    std::map<MyEnum3::type, std::set<MyEnum3::type> > ::const_iterator _iter131;
    for (_iter131 = this->enum_set_map.begin(); _iter131 != this->enum_set_map.end(); ++_iter131)
    {
      xfer += oprot->writeI32((int32_t)_iter131->first);
      {
        xfer += oprot->writeSetBegin(::apache::thrift::protocol::T_I32, static_cast<uint32_t>(_iter131->second.size()));
        std::set<MyEnum3::type> ::const_iterator _iter132;
        for (_iter132 = _iter131->second.begin(); _iter132 != _iter131->second.end(); ++_iter132)
        {
          xfer += oprot->writeI32((int32_t)(*_iter132));
        }
        xfer += oprot->writeSetEnd();
      }
    }
    xfer += oprot->writeMapEnd();
  }
  xfer += oprot->writeFieldEnd();

  xfer += oprot->writeFieldBegin("enum_list_map", ::apache::thrift::protocol::T_MAP, 49);
  {
    xfer += oprot->writeMapBegin(::apache::thrift::protocol::T_I32, ::apache::thrift::protocol::T_LIST, static_cast<uint32_t>(this->enum_list_map.size()));
    std::map<MyEnum3::type, std::vector<MyEnum3::type> > ::const_iterator _iter133;
    for (_iter133 = this->enum_list_map.begin(); _iter133 != this->enum_list_map.end(); ++_iter133)
    {
      xfer += oprot->writeI32((int32_t)_iter133->first);
      {
        xfer += oprot->writeListBegin(::apache::thrift::protocol::T_I32, static_cast<uint32_t>(_iter133->second.size()));
        std::vector<MyEnum3::type> ::const_iterator _iter134;
        for (_iter134 = _iter133->second.begin(); _iter134 != _iter133->second.end(); ++_iter134)
        {
          xfer += oprot->writeI32((int32_t)(*_iter134));
        }
        xfer += oprot->writeListEnd();
      }
    }
    xfer += oprot->writeMapEnd();
  }
  xfer += oprot->writeFieldEnd();

  xfer += oprot->writeFieldStop();
  xfer += oprot->writeStructEnd();
  return xfer;
}

void swap(EnumTestStruct &a, EnumTestStruct &b) {
  using ::std::swap;
  swap(a.a_enum, b.a_enum);
  swap(a.enum_list, b.enum_list);
  swap(a.enum_set, b.enum_set);
  swap(a.enum_enum_map, b.enum_enum_map);
  swap(a.list_enum_map, b.list_enum_map);
  swap(a.set_enum_map, b.set_enum_map);
  swap(a.map_enum_map, b.map_enum_map);
  swap(a.enum_map_map, b.enum_map_map);
  swap(a.enum_set_map, b.enum_set_map);
  swap(a.enum_list_map, b.enum_list_map);
  swap(a.__isset, b.__isset);
}

EnumTestStruct::EnumTestStruct(const EnumTestStruct& other135) {
  a_enum = other135.a_enum;
  enum_list = other135.enum_list;
  enum_set = other135.enum_set;
  enum_enum_map = other135.enum_enum_map;
  list_enum_map = other135.list_enum_map;
  set_enum_map = other135.set_enum_map;
  map_enum_map = other135.map_enum_map;
  enum_map_map = other135.enum_map_map;
  enum_set_map = other135.enum_set_map;
  enum_list_map = other135.enum_list_map;
  __isset = other135.__isset;
}
EnumTestStruct& EnumTestStruct::operator=(const EnumTestStruct& other136) {
  a_enum = other136.a_enum;
  enum_list = other136.enum_list;
  enum_set = other136.enum_set;
  enum_enum_map = other136.enum_enum_map;
  list_enum_map = other136.list_enum_map;
  set_enum_map = other136.set_enum_map;
  map_enum_map = other136.map_enum_map;
  enum_map_map = other136.enum_map_map;
  enum_set_map = other136.enum_set_map;
  enum_list_map = other136.enum_list_map;
  __isset = other136.__isset;
  return *this;
}
void EnumTestStruct::printTo(std::ostream& out) const {
  using ::apache::thrift::to_string;
  out << "EnumTestStruct(";
  out << "a_enum=" << to_string(a_enum);
  out << ", " << "enum_list=" << to_string(enum_list);
  out << ", " << "enum_set=" << to_string(enum_set);
  out << ", " << "enum_enum_map=" << to_string(enum_enum_map);
  out << ", " << "list_enum_map=" << to_string(list_enum_map);
  out << ", " << "set_enum_map=" << to_string(set_enum_map);
  out << ", " << "map_enum_map=" << to_string(map_enum_map);
  out << ", " << "enum_map_map=" << to_string(enum_map_map);
  out << ", " << "enum_set_map=" << to_string(enum_set_map);
  out << ", " << "enum_list_map=" << to_string(enum_list_map);
  out << ")";
}


